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
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;700&display=swap');
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #e8f5e9, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .certificate {
            width: 595px;
            height: 842px;
            margin: 20px auto;
            padding: 40px;
            box-sizing: border-box;
            background: #ffffff;
            position: relative;
            border: 8px double #4CAF50;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            overflow: hidden;
            animation: fadeIn 1s ease-in-out;
            background-image: radial-gradient(circle at 50% 50%, rgba(76, 175, 80, 0.1) 0%, transparent 70%);
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: scale(0.95); }
            100% { opacity: 1; transform: scale(1); }
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 60px;
            color: rgba(76, 175, 80, 0.1);
            font-family: 'Playfair Display', serif;
            text-transform: uppercase;
            pointer-events: none;
        }
        .logo {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(#e8f5e9, #c8e6c9);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }
        .logo:hover {
            transform: translateX(-50%) scale(1.05);
        }
        .logo img {
            max-width: 90%;
            max-height: 90%;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-top: 140px;
        }
        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 40px;
            color: #2e7d32;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 4px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.1);
        }
        .header h2 {
            font-size: 20px;
            color: #555;
            margin: 15px 0;
            font-weight: 400;
            letter-spacing: 1px;
        }
        .company {
            text-align: center;
            font-size: 16px;
            color: #666;
            margin-top: 20px;
            font-style: italic;
            border-top: 2px dashed #4CAF50;
            padding-top: 15px;
            transition: color 0.3s ease;
        }
        .company:hover {
            color: #2e7d32;
        }
        .recipient {
            text-align: center;
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #2e7d32;
            margin: 50px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            animation: slideIn 0.5s ease-in-out;
        }
        @keyframes slideIn {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        .date-box {
            text-align: center;
            font-size: 16px;
            color: #fff;
            background: linear-gradient(to right, #4CAF50, #2e7d32);
            padding: 10px 25px;
            border-radius: 10px;
            display: inline-block;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .description {
            text-align: center;
            font-size: 16px;
            color: #333;
            margin: 30px 60px;
            line-height: 1.8;
            border: 2px solid #4CAF50;
            border-radius: 8px;
            padding: 20px;
            background: rgba(232, 245, 233, 0.5);
        }
        .signature {
            text-align: center;
            font-size: 16px;
            color: #2e7d32;
            margin: 60px 50px 0;
        }
        .signature strong {
            display: block;
            font-weight: 700;
            margin-top: 15px;
        }
        .signature img {
            max-width: 150px;
            max-height: 60px;
            width: auto;
            height: auto;
            margin: 15px auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.2));
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="watermark">Certified</div>
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
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Source+Serif+Pro:wght@600&display=swap');
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(to bottom, #eceff1, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .certificate {
            width: 595px;
            height: 842px;
            margin: 20px auto;
            padding: 40px;
            box-sizing: border-box;
            background: #ffffff;
            position: relative;
            border: 8px double #212121;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            overflow: hidden;
            animation: slideUp 1s ease-in-out;
            background-image: radial-gradient(circle at 50% 50%, rgba(33, 33, 33, 0.1) 0%, transparent 70%);
        }
        @keyframes slideUp {
            0% { transform: translateY(50px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 60px;
            color: rgba(33, 33, 33, 0.1);
            font-family: 'Source Serif Pro', serif;
            text-transform: uppercase;
            pointer-events: none;
        }
        .logo {
            position: absolute;
            top: 30px;
            right: 30px;
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #212121;
            border-radius: 50%;
            background: #eceff1;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }
        .logo:hover {
            transform: scale(1.05);
        }
        .logo img {
            max-width: 90%;
            max-height: 90%;
        }
        .header {
            text-align: left;
            margin-bottom: 30px;
            padding-top: 120px;
            border-bottom: 3px double #212121;
            padding-bottom: 15px;
        }
        .header h1 {
            font-family: 'Source Serif Pro', serif;
            font-size: 36px;
            color: #212121;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 600;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }
        .header h2 {
            font-size: 20px;
            color: #424242;
            margin: 12px 0;
            font-weight: 500;
            letter-spacing: 1px;
        }
        .company {
            text-align: left;
            font-size: 16px;
            color: #424242;
            margin-top: 20px;
            font-style: italic;
            border-left: 2px solid #212121;
            padding-left: 15px;
        }
        .recipient {
            text-align: left;
            font-family: 'Source Serif Pro', serif;
            font-size: 42px;
            color: #212121;
            margin: 40px 0;
            font-weight: 600;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            animation: fadeInText 0.5s ease-in-out;
        }
        @keyframes fadeInText {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .date-box {
            text-align: left;
            font-size: 16px;
            color: #ffffff;
            background: linear-gradient(to right, #212121, #424242);
            padding: 10px 25px;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .description {
            text-align: left;
            font-size: 16px;
            color: #333;
            margin: 30px 0;
            line-height: 1.8;
            border: 2px solid #212121;
            border-radius: 8px;
            padding: 20px;
            background: rgba(236, 239, 241, 0.5);
        }
        .signature {
            text-align: left;
            font-size: 16px;
            color: #212121;
            margin-top: 50px;
        }
        .signature strong {
            display: block;
            font-weight: 700;
            margin-top: 15px;
        }
        .signature img {
            max-width: 150px;
            max-height: 60px;
            width: auto;
            height: auto;
            margin: 15px 0;
            object-fit: contain;
            filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.2));
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="watermark">Internship</div>
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
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Open+Sans:wght@400;600&display=swap');
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(to bottom, #e3f2fd, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .certificate {
            width: 595px;
            height: 842px;
            margin: 20px auto;
            padding: 40px;
            box-sizing: border-box;
            background: #ffffff;
            position: relative;
            border: 8px double #1E88E5;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            overflow: hidden;
            animation: zoomIn 1s ease-in-out;
            background-image: radial-gradient(circle at 50% 50%, rgba(30, 136, 229, 0.1) 0%, transparent 70%);
        }
        @keyframes zoomIn {
            0% { transform: scale(0.95); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 60px;
            color: rgba(30, 136, 229, 0.1);
            font-family: 'Cinzel', serif;
            text-transform: uppercase;
            pointer-events: none;
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
            border: 3px solid #1E88E5;
            border-radius: 50%;
            background: linear-gradient(#e3f2fd, #bbdefb);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
        }
        .logo:hover {
            transform: translateX(-50%) scale(1.05);
        }
        .logo img {
            max-width: 90%;
            max-height: 90%;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-top: 130px;
        }
        .header h1 {
            font-family: 'Cinzel', serif;
            font-size: 38px;
            color: #1E88E5;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }
        .header h2 {
            font-size: 18px;
            color: #555;
            margin: 15px 0;
            font-weight: 400;
            letter-spacing: 1px;
        }
        .company {
            text-align: center;
            font-size: 16px;
            color: #666;
            margin-top: 20px;
            font-style: italic;
            border-bottom: 2px dashed #1E88E5;
            padding-bottom: 15px;
            transition: color 0.3s ease;
        }
        .company:hover {
            color: #1E88E5;
        }
        .recipient {
            text-align: center;
            font-family: 'Cinzel', serif;
            font-size: 46px;
            color: #1E88E5;
            margin: 40px 0;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
            animation: fadeInText 0.5s ease-in-out;
        }
        @keyframes fadeInText {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .date-box {
            text-align: center;
            font-size: 16px;
            color: #fff;
            background: linear-gradient(to right, #1E88E5, #1976D2);
            padding: 10px 25px;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .description {
            text-align: center;
            font-size: 16px;
            color: #333;
            margin: 30px 50px;
            line-height: 1.8;
            border: 2px solid #1E88E5;
            border-radius: 8px;
            padding: 20px;
            background: rgba(227, 242, 253, 0.5);
        }
        .signature {
            text-align: center;
            font-size: 16px;
            color: #1E88E5;
            margin: 60px 50px 0;
        }
        .signature strong {
            display: block;
            font-weight: 600;
            margin-top: 15px;
        }
        .signature img {
            max-width: 150px;
            max-height: 60px;
            width: auto;
            height: auto;
            margin: 15px auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.2));
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="watermark">Appreciation</div>
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