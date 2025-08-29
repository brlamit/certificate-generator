<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\User;
use App\Models\CertificateTemplate;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function showForm()
    {
        $users = User::all(); // Or filter as needed
        $templates = CertificateTemplate::all();
        return view('certificates.select-users', compact('users', 'templates'));
    }

    public function generate(Request $request)
    {
        $user = Auth::user();
        $template = CertificateTemplate::findOrFail($request->input('template_id'));

        $html = $this->replacePlaceholders($template->html_content, $user,  $template);

        $pdf = Pdf::loadHtml($html);

        return $pdf->download('certificate-'.$user->id.'.pdf');
    }

    public function generateMultiple(Request $request)
    {
        $userIds = $request->input('user_ids', []);
        $templateId = $request->input('template_id');

        if (empty($userIds)) {
            return redirect()->back()->with('error', 'Please select at least one user.');
        }

        if (!$templateId) {
            return redirect()->back()->with('error', 'Please select a certificate type.');
        }

        $users = User::whereIn('id', $userIds)->get();
        $template = CertificateTemplate::findOrFail($templateId);

        $zipFileName = 'certificates.zip';
        $zipPath = storage_path($zipFileName);
        $zip = new ZipArchive;

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($users as $user) {
               $html = $this->replacePlaceholders($template->html_content, $user, $template);
                $pdf = Pdf::loadHtml($html);
                $pdfName = "certificate-{$user->id}-{$template->name}.pdf";
                $pdfPath = storage_path($pdfName);
                $pdf->save($pdfPath);
                $zip->addFile($pdfPath, $pdfName);
                unlink($pdfPath);
            }
            $zip->close();
        } else {
            return redirect()->back()->with('error', 'Failed to create zip file.');
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    private function replacePlaceholders($html, $user, $template)
    {
        $replacements = [
            '{{name}}' => $user->name,
            '{{description}}' => $template->default_description ?? 'Has made an extraordinary work of art project and has been accepted by the wider community. We give this award certificate with great gratitude and hopefully it will be a motivation.',
            '{{date}}' => now()->format('F d, Y'), // e.g., "August 28, 2025"
            '{{signatory1}}' => 'Utshab Dhungana',
            '{{position1}}' => 'CEO',
            '{{signatory2}}' => 'Sagar Timilsina',
            '{{position2}}' => 'Mentor',
        ];

        return str_replace(array_keys($replacements), array_values($replacements), $html);
    }
}