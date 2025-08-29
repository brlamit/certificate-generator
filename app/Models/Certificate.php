<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'certificates';

    protected $fillable = [
        'name',
        'certificate_type',
        'position',
        'start_date',
        'end_date',
        'issuer_name',
        'issuer_title',
        'company_name',
        'signature',
        'issued_date',
        'description',
        'certificate_id',
        'user_id',
        'template_id'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'issued_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(CertificateTemplate::class);
    }
}