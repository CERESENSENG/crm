
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <title>Admission Letter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }
        h1, p {
            margin: 0 0 20px;
        }
        .header, .footer {
            text-align: center;
        }
        .footer {
            margin-top: 40px;
            font-size: 0.9em;
        }
        .signature {
            margin-top: 40px;
        }
    </style>
</head>
<body>
  @if($students)
    <div class="container-fluid">
        <div class="header">
            <div class="text-center mt-4">
                <img height="30%"  src="/asset/images/ceresense_logo.png" alt="">
                <h6><a href="">www.ceresense.com.ng</a></h6>
                <h6 class="fw-light">No 2,foyeke street,opposite tawheed junction, basin, ilorin, kwara state.</h6>
            </div>
            
        </div>
        <p class="fw-bold">Dear {{$students->firstname}} {{$students->surname}} {{$students->othername}}</p>

        <h1>Subject: Admission Offer to Ceresense Tech School</h1>

        <p>We are delighted to inform you that you have been granted admission to Ceresense Tech School for the [academic year/semester]. Congratulations on your achievement!</p>

        <p>At Ceresense Tech School, we are committed to fostering innovation, critical thinking, and hands-on experience in the fields of technology and engineering. Your application stood out for its exemplary academic performance, extracurricular involvement, and strong personal statement. We are confident that you will contribute significantly to our vibrant community.</p>

        <p>Here are the details of your admission:</p>

        <ul>
            <li><strong>Program:</strong>{{$students->department->name}}</li>
            <li><strong>Duration:</strong>{{$students->department->duration}}</li>
            <li><strong>Hostel:</strong>{{$students->hostel}}</li>
            <li><strong>Wifi:</strong>{{$students->wifi}}</li>
            <li><strong>Skill_monetization:</strong>{{$students->skill_monetization}}</li>
        </ul>

        <p>Please find enclosed the following documents for your reference:</p>
        <ul>
            <li><strong>Admission Agreement:</strong> This document outlines the terms and conditions of your admission. Kindly review, sign, and return a copy to our admissions office by [deadline date].</li>
            <li><strong>Fee Structure and Payment Schedule:</strong> Details regarding tuition fees, payment deadlines, and available payment plans.</li>
            <li><strong>Class Schedule:</strong> A tentative schedule of your classes for the cohorts</li>
           
        </ul>

        <p>To confirm your acceptance of this offer, please complete the enclosed Admission Agreement and submit it along with the required deposit by [acceptance deadline]. You can submit these documents either by mail or through our online portal at <a href="ceresense.com.ng">Ceresense.com.ng</a></p>

        <p>We look forward to welcoming you to the Ceresense Tech School family. Should you have any questions or need further assistance, please do not hesitate to contact our admissions office at [admissions office contact information]. We are here to support you every step of the way.</p>

        <p>Once again, congratulations on your admission. We are excited to see the remarkable contributions you will make to our community.</p>

        <div class="signature">
            <p>Warm regards,</p>
            <p>[Admin]</p>
            <p>{{$current_Date}}</p>            
        </div>
    </div>
    @endif
</body>
</html>

 
