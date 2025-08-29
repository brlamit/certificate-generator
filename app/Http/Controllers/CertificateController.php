<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\User;
use App\Models\CertificateTemplate;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class CertificateController extends Controller
{
    private function getValidationRules(): array
    {
        return [
            'template_id' => 'required|exists:certificate_templates,id',
            'user_id' => 'required|exists:users,id',
            'internship_position' => 'required|string|max:255',
            'internship_start_date' => 'required|date',
            'internship_end_date' => 'required|date|after_or_equal:internship_start_date',
            'issuer_first_name' => 'required|string|max:255',
            'issuer_last_name' => 'required|string|max:255',
            'issuer_position' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'signature' => 'required|string',
            'date_signed' => 'required|date',
        ];
    }

    public function showForm()
    {
        return view('certificates.select-users', [
            'users' => User::all(),
            'templates' => CertificateTemplate::all()
        ]);
    }

    public function generate(Request $request)
    {
        $data = $request->validate($this->getValidationRules());

        try {
            $certificate = $this->createCertificate($data);
            $html = $this->generateHtml($certificate);
            return Pdf::loadHtml($html)->download("certificate-{$certificate->user_id}.pdf");
        } catch (\Exception $e) {
            Log::error("Certificate generation failed for user ID: {$data['user_id']} - {$e->getMessage()}");
            return redirect()->back()->with('error', 'Failed to generate certificate.');
        }
    }

    private function createCertificate(array $data): Certificate
    {
        $user = User::findOrFail($data['user_id']);
        $template = CertificateTemplate::findOrFail($data['template_id']);

        $certificate_id = uniqid('cert_');

        return Certificate::create([
            'name' => $user->name,
            'certificate_type' => $template->name,
            'position' => $data['internship_position'],
            'start_date' => $data['internship_start_date'],
            'end_date' => $data['internship_end_date'],
            'issuer_name' => "{$data['issuer_first_name']} {$data['issuer_last_name']}",
            'issuer_title' => $data['issuer_position'],
            'company_name' => $data['company_name'],
            'signature' => $this->saveSignature($data['signature']),
            'issued_date' => $data['date_signed'],
            'certificate_id' => $certificate_id,
            'user_id' => $data['user_id'],
            'template_id' => $data['template_id'],
        ]);
    }

    private function generateHtml(Certificate $certificate): string
    {
        $template = CertificateTemplate::findOrFail($certificate->template_id);
        $html = str_replace(
            ['{{name}}', '{{certificate_type}}', '{{position}}', '{{internship_start_date}}', '{{internship_end_date}}', 
             '{{issuer_name}}', '{{issuer_title}}', '{{company_name}}', '{{date_signed}}', '{{description}}'],
            [$certificate->name, $certificate->certificate_type, $certificate->position,
             \Carbon\Carbon::parse($certificate->start_date)->format('F d, Y'),
             \Carbon\Carbon::parse($certificate->end_date)->format('F d, Y'),
             $certificate->issuer_name, $certificate->issuer_title, $certificate->company_name,
             \Carbon\Carbon::parse($certificate->issued_date)->format('F d, Y'),
             $certificate->description ?? 'Has successfully completed the requirements and demonstrated exceptional skills and dedication.'],
            $template->html_content
        );

        $relativePath = str_replace('/storage/', '', parse_url($certificate->signature, PHP_URL_PATH));
        $absolutePath = Storage::disk('public')->path($relativePath);

        if (file_exists($absolutePath)) {
            $imageData = base64_encode(file_get_contents($absolutePath));
            $mimeType = mime_content_type($absolutePath);
            $html = str_replace('{{signature}}', '<img src="data:' . $mimeType . ';base64,' . $imageData . '" alt="Signature" style="max-width:150px;max-height:60px;object-fit:contain;">', $html);
        } else {
            Log::warning("Signature file not found: {$absolutePath}");
        }

        return $html;
    }

    private function saveSignature(string $signature): string
    {
        if (!preg_match('/^data:image\/(png|jpeg);base64,/', $signature, $matches)) {
            throw new \Exception('Invalid signature format. Only PNG and JPEG are supported.');
        }

        $imageType = $matches[1];
        $signatureData = base64_decode(preg_replace('#^data:image/\w+;base64,(.+)#', '$1', $signature), true);
        if ($signatureData === false) {
            throw new \Exception('Invalid base64 signature data.');
        }

        $path = 'signatures/' . uniqid('sig_') . '.' . $imageType;
        Storage::disk('public')->put($path, $signatureData) ?: throw new \Exception('Failed to save signature.');

        return Storage::disk('public')->url($path);
    }
}