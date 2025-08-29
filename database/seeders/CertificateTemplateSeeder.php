<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CertificateTemplate;

class CertificateTemplateSeeder extends Seeder
{
    public function run(): void
    {
        // Template 1: Course Completion (Green theme, matching provided design with logo)
        CertificateTemplate::create([
            'name' => 'Course Completion',
            'html_content' => <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica', Arial, sans-serif;
            background: #f5f5f5;
        }
        .certificate {
            width: 595px;
            height: 842px;
            margin: 0 auto;
            padding: 30px;
            box-sizing: border-box;
            background: #fff;
            position: relative;
            border: 10px solid transparent;
            border-image: linear-gradient(to right, #4CAF50, #45a049) 1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .logo img {
            max-width: 100%;
            max-height: 100%;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-top: 60px; /* Space for logo */
        }
        .header h1 {
            font-size: 32px;
            color: #2e7d32;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .header h2 {
            font-size: 16px;
            color: #666;
            margin: 5px 0;
            font-weight: normal;
        }
        .company {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 10px;
            font-style: italic;
        }
        .recipient {
            text-align: center;
            font-family: 'Georgia', serif;
            font-size: 40px;
            color: #2e7d32;
            margin: 30px 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .date-box {
            text-align: center;
            font-size: 14px;
            color: #fff;
            background: #4CAF50;
            padding: 5px 15px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 15px;
        }
        .description {
            text-align: center;
            font-size: 14px;
            color: #333;
            margin: 20px 40px;
            line-height: 1.5;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin: 50px 40px 0;
        }
        .signature {
            text-align: center;
            font-size: 14px;
            color: #2e7d32;
        }
        .signature strong {
            display: block;
            font-weight: bold;
        }
        .signature .signature-line {
            height: 30px;
            width: 100px;
            border-bottom: 1px dashed #2e7d32;
            margin: 5px auto;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="logo"><img src="assets/images/xavtechnology.jpg" alt="XAV Technology Logo"></div>
        <div class="header">
            <h1>CERTIFICATE OF COURSE COMPLETION</h1>
            <h2>This certificate is proudly presented to:</h2>
        </div>
        <div class="company">Issued by XAV Technology</div>
        <div class="recipient">{{name}}</div>
        <div class="date-box">{{date}}</div>
        <div class="description">
            For successfully completing the course requirements.
        </div>
        <div class="signatures">
            <div class="signature">
                <div class="signature-line"></div>
                <strong>{{signatory1}}</strong>
                {{position1}}
            </div>
            <div class="signature">
                <div class="signature-line"></div>
                <strong>{{signatory2}}</strong>
                {{position2}}
            </div>
        </div>
    </div>
</body>
</html>
HTML,
        ]);

        // Template 2: Internship Completion (Green theme, matching provided design with logo)
        CertificateTemplate::create([
            'name' => 'Internship Completion',
            'html_content' => <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica', Arial, sans-serif;
            background: #f5f5f5;
        }
        .certificate {
            width: 595px;
            height: 842px;
            margin: 0 auto;
            padding: 30px;
            box-sizing: border-box;
            background: #fff;
            position: relative;
            border: 10px solid transparent;
            border-image: linear-gradient(to right, #4CAF50, #45a049) 1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .logo img {
            max-width: 100%;
            max-height: 100%;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-top: 60px; /* Space for logo */
        }
        .header h1 {
            font-size: 32px;
            color: #2e7d32;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .header h2 {
            font-size: 16px;
            color: #666;
            margin: 5px 0;
            font-weight: normal;
        }
        .company {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 10px;
            font-style: italic;
        }
        .recipient {
            text-align: center;
            font-family: 'Georgia', serif;
            font-size: 40px;
            color: #2e7d32;
            margin: 30px 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .date-box {
            text-align: center;
            font-size: 14px;
            color: #fff;
            background: #4CAF50;
            padding: 5px 15px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 15px;
        }
        .description {
            text-align: center;
            font-size: 14px;
            color: #333;
            margin: 20px 40px;
            line-height: 1.5;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin: 50px 40px 0;
        }
        .signature {
            text-align: center;
            font-size: 14px;
            color: #2e7d32;
        }
        .signature strong {
            display: block;
            font-weight: bold;
        }
        .signature .signature-line {
            height: 30px;
            width: 100px;
            border-bottom: 1px dashed #2e7d32;
            margin: 5px auto;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="logo">
        
        <img src="assets/images/xavtechnology.jpg" alt="XAV Technology Logo">
        </div>
        <div class="header">
            <h1>CERTIFICATE OF INTERNSHIP COMPLETION</h1>
            <h2>This certificate is proudly presented to:</h2>
        </div>
        <div class="company">Issued by XAV Technology</div>
        <div class="recipient">{{name}}</div>
        <div class="date-box">{{date}}</div>
        <div class="description">
            For successfully completing the internship program.
        </div>
        <div class="signatures">
            <div class="signature">
                <div class="signature-line"></div>
                <strong>{{signatory1}}</strong>
                {{position1}}
            </div>
            <div class="signature">
                <div class="signature-line"></div>
                <strong>{{signatory2}}</strong>
                {{position2}}
            </div>
        </div>
    </div>
</body>
</html>
HTML,
        ]);

        // Template 3: Appreciation (Green theme, matching provided design with logo) - Unchanged from previous
        CertificateTemplate::create([
            'name' => 'Appreciation',
            'html_content' => <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Certificate</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica', Arial, sans-serif;
            background: #f5f5f5;
        }
        .certificate {
            width: 595px;
            height: 842px;
            margin: 0 auto;
            padding: 30px;
            box-sizing: border-box;
            background: #fff;
            position: relative;
            border: 10px solid transparent;
            border-image: linear-gradient(to right, #4CAF50, #45a049) 1;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        .logo img {
            max-width: 100%;
            max-height: 100%;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-top: 60px; /* Space for logo */
        }
        .header h1 {
            font-size: 32px;
            color: #2e7d32;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .header h2 {
            font-size: 16px;
            color: #666;
            margin: 5px 0;
            font-weight: normal;
        }
        .company {
            text-align: center;
            font-size: 12px;
            color: #666;
            margin-top: 10px;
            font-style: italic;
        }
        .recipient {
            text-align: center;
            font-family: 'Georgia', serif;
            font-size: 40px;
            color: #2e7d32;
            margin: 30px 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .date-box {
            text-align: center;
            font-size: 14px;
            color: #fff;
            background: #4CAF50;
            padding: 5px 15px;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 15px;
        }
        .description {
            text-align: center;
            font-size: 14px;
            color: #333;
            margin: 20px 40px;
            line-height: 1.5;
        }
        .signatures {
            display: flex;
            justify-content: space-between;
            margin: 50px 40px 0;
        }
        .signature {
            text-align: center;
            font-size: 14px;
            color: #2e7d32;
        }
        .signature strong {
            display: block;
            font-weight: bold;
        }
        .signature .signature-line {
            height: 30px;
            width: 100px;
            border-bottom: 1px dashed #2e7d32;
            margin: 5px auto;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="logo"><img src="assets/images/xavtechnology.jpg" alt="XAV Technology Logo"></div>
        <div class="header">
            <h1>CERTIFICATE OF APPRECIATION</h1>
            <h2>This certificate is proudly presented to:</h2>
        </div>
        <div class="company">Issued by XAV Technology</div>
        <div class="recipient">{{name}}</div>
        <div class="date-box">{{date}}</div>
        <div class="description">
            {{description}}
        </div>
        <div class="signatures">
            <div class="signature">
                <div class="signature-line"></div>
                <strong>{{signatory1}}</strong>
                {{position1}}
            </div>
            <div class="signature">
                <div class="signature-line"></div>
                <strong>{{signatory2}}</strong>
                {{position2}}
            </div>
        </div>
    </div>
</body>
</html>
HTML,
        ]);
    }
}