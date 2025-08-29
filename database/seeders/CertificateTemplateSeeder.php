<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CertificateTemplate;

class CertificateTemplateSeeder extends Seeder
{
    public function run(): void
    {
        // Template 1: Course Completion (Green Theme)
        CertificateTemplate::create([
            'name' => 'Course Completion',
            'html_content' => <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Course Completion Certificate</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400&display=swap');
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: #f5f5f5;
        }
        .certificate {
            width: 595px;
            height: 842px;
            margin: 0 auto;
            padding: 40px;
            box-sizing: border-box;
            background: #fff;
            position: relative;
            border: 12px double #4CAF50;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }
        .logo {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #f5f5f5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .logo img {
            max-width: 90%;
            max-height: 90%;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-top: 120px;
        }
        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #2e7d32;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        .header h2 {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
            font-weight: 400;
        }
        .company {
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-top: 15px;
            font-style: italic;
            border-top: 1px solid #4CAF50;
            padding-top: 10px;
        }
        .recipient {
            text-align: center;
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #2e7d32;
            margin: 40px 0;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }
        .date-box {
            text-align: center;
            font-size: 16px;
            color: #fff;
            background: linear-gradient(to right, #4CAF50, #45a049);
            padding: 8px 20px;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .description {
            text-align: center;
            font-size: 16px;
            color: #333;
            margin: 30px 50px;
            line-height: 1.6;
            border-left: 2px solid #4CAF50;
            border-right: 2px solid #4CAF50;
            padding: 0 20px;
        }
        .signature {
            text-align: center;
            font-size: 16px;
            color: #2e7d32;
            margin: 60px 50px 0;
        }
        .signature strong {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }
        .signature img {
            max-width: 150px;
            max-height: 60px;
            width: auto;
            height: auto;
            margin: 15px auto;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="logo"><img src="assets/images/xavtechnology.jpg" alt="Company Logo"></div>
        <div class="header">
            <h1>{{certificate_type}}</h1>
            <h2>This certificate is proudly presented to:</h2>
        </div>
        <div class="recipient">{{name}}</div>
        <div class="company">Issued by {{company_name}}</div>
        <div class="date-box">{{date_signed}}</div>
        <div class="description">
            {{description}}
        </div>
        <div class="signature">
            <strong>{{signature}}</strong>
            <strong>{{issuer_name}}</strong>
            {{issuer_title}}
        </div>
    </div>
</body>
</html>
HTML,
        ]);

        // Template 2: Internship Completion (Black-and-White Theme)
        CertificateTemplate::create([
            'name' => 'Internship Completion',
            'html_content' => <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Internship Completion Certificate</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap');
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background: #fff;
        }
        .certificate {
            width: 595px;
            height: 842px;
            margin: 0 auto;
            padding: 30px;
            box-sizing: border-box;
            background: #fff;
            position: relative;
            border: 8px solid #000;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .logo {
            position: absolute;
            top: 20px;
            right: 30px;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo img {
            max-width: 100%;
            max-height: 100%;
        }
        .header {
            text-align: left;
            margin-bottom: 20px;
            padding-top: 80px;
            border-bottom: 2px solid #000;
        }
        .header h1 {
            font-size: 30px;
            color: #000;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
        }
        .header h2 {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
            font-weight: 500;
        }
        .company {
            text-align: left;
            font-size: 14px;
            color: #333;
            margin-top: 10px;
        }
        .recipient {
            text-align: left;
            font-size: 36px;
            color: #000;
            margin: 30px 0;
            font-weight: 700;
        }
        .date-box {
            text-align: left;
            font-size: 14px;
            color: #000;
            background: #f0f0f0;
            padding: 6px 15px;
            display: inline-block;
            margin-bottom: 15px;
        }
        .description {
            text-align: left;
            font-size: 14px;
            color: #333;
            margin: 20px 0;
            line-height: 1.6;
        }
        .signature {
            text-align: left;
            font-size: 14px;
            color: #000;
            margin-top: 40px;
        }
        .signature strong {
            display: block;
            font-weight: 700;
            margin-top: 10px;
        }
        .signature img {
            max-width: 150px;
            max-height: 60px;
            width: auto;
            height: auto;
            margin: 10px 0;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="logo"><img src="assets/images/xavtechnology.jpg" alt="Company Logo"></div>
        <div class="header">
            <h1>{{certificate_type}}</h1>
            <h2>Awarded to:</h2>
        </div>
        <div class="recipient">{{name}}</div>
        <div class="company">Issued by {{company_name}}</div>
        <div class="date-box">{{date_signed}}</div>
        <div class="description">
            For successfully completing the {{position}} internship from {{internship_start_date}} to {{internship_end_date}}. {{description}}
        </div>
        <div class="signature">
            <strong>{{signature}}</strong>
            <strong>{{issuer_name}}</strong>
            {{issuer_title}}
        </div>
    </div>
</body>
</html>
HTML,
        ]);

        // Template 3: Appreciation (Blue Theme)
        CertificateTemplate::create([
            'name' => 'Appreciation',
            'html_content' => <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Appreciation Certificate</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Open+Sans:wght@400&display=swap');
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background: #f5f5f5;
        }
        .certificate {
            width: 595px;
            height: 842px;
            margin: 0 auto;
            padding: 35px;
            box-sizing: border-box;
            background: #fff;
            position: relative;
            border: 15px solid transparent;
            border-image: url('data:image/svg+xml;utf8,<svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><path d="M0 0 L20 20 L40 0 L60 20 L80 0 L100 20 L80 40 L100 60 L80 80 L100 100 L80 100 L60 80 L40 100 L20 80 L0 100 L20 80 L0 60 L20 40 L0 20 Z" fill="none" stroke="#1E88E5" stroke-width="5"/></svg>') 25;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }
        .logo {
            position: absolute;
            top: 25px;
            left: 50%;
            transform: translateX(-50%);
            width: 90px;
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #1E88E5;
            border-radius: 50%;
        }
        .logo img {
            max-width: 85%;
            max-height: 85%;
        }
        .header {
            text-align: center;
            margin-bottom: 25px;
            padding-top: 110px;
        }
        .header h1 {
            font-family: 'Cinzel', serif;
            font-size: 34px;
            color: #1E88E5;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .header h2 {
            font-size: 16px;
            color: #555;
            margin: 10px 0;
            font-weight: 400;
        }
        .company {
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-top: 15px;
            font-style: italic;
            border-bottom: 1px dashed #1E88E5;
            padding-bottom: 10px;
        }
        .recipient {
            text-align: center;
            font-family: 'Cinzel', serif;
            font-size: 44px;
            color: #1E88E5;
            margin: 35px 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .date-box {
            text-align: center;
            font-size: 15px;
            color: #fff;
            background: #1E88E5;
            padding: 7px 18px;
            border-radius: 6px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .description {
            text-align: center;
            font-size: 15px;
            color: #333;
            margin: 25px 45px;
            line-height: 1.6;
        }
        .signature {
            text-align: center;
            font-size: 15px;
            color: #1E88E5;
            margin: 55px 45px 0;
        }
        .signature strong {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }
        .signature img {
            max-width: 150px;
            max-height: 60px;
            width: auto;
            height: auto;
            margin: 15px auto;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="logo"><img src="assets/images/xavtechnology.jpg" alt="Company Logo"></div>
        <div class="header">
            <h1>{{certificate_type}}</h1>
            <h2>This certificate is proudly presented to:</h2>
        </div>
        <div class="recipient">{{name}}</div>
        <div class="company">Issued by {{company_name}}</div>
        <div class="date-box">{{date_signed}}</div>
        <div class="description">
            {{description}}
        </div>
        <div class="signature">
            <strong>{{signature}}</strong>
             <strong>{{issuer_name}}</strong>
            {{issuer_title}}
        </div>
    </div>
</body>
</html>
HTML,
        ]);
    }
}
