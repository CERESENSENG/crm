
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admission</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
  
    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
    
    <!-- Main CSS File -->
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
    <!-- =======================================================
    * Template Name: Mentor
    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    * Updated: Jun 14 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>
<body>
    @if($students)
    <div class="admission-logo-watermark text-center">
        <img src="{{asset('assets/img/favicon.png')}}" alt="Logo">
    </div>

    <div class="container p-3 p-md-4 p-lg-5 ">
        <!-- Header Section -->
        <div class="admission-header-section row">
            <div class="col-2 admission-logo">
                <img src="{{asset('assets/img/favicon.png')}}" alt="School Logo">
            </div>
            <div class="col-10 text-center">
                <h1 class="school-name">Ceresense ICT Institution</h1>
                <h5 class="school-address">N0 2,Foyeke street,opposite tawheed junction,basin,ilorin,kwara state</h5>
                <h6 class="school-website">Website: <a href="">www.ceresense.com.ng</a> | Contact: <span
                        class="school-contact">+234 7063419718, +234 8036436594</span></h6>
            </div>
        </div>
        <!-- date -->
        <div class="text-right mt-2">
            <h6>{{$current_Date}}</h6>
        </div>

        <!-- Student Information Section -->
        <div class="student-info ">
            <img style="" width="100px" height="100px" src="{{ asset('upload/' . $students->passport) }}"
              alt="">
            <p class="mb-0 mt-1"><strong>Name:</strong> {{ucfirst(strtolower($students->firstname))}} {{ucfirst(strtolower($students->surname))}} {{ucfirst(strtolower($students->othername))}}</p>
            <p><strong>App No:</strong> {{ $students->app_no}}</p>
        </div>

        <!-- Main Letter Section -->
        <div class="mt-2">
            <h4 class="text-center">Admission Letter</h4>
            <p>Dear {{$students->firstname}} {{$students->surname}},</p>
            <p>We are pleased to inform you that you have been offered provisional admission into the Ceresense ICT
                Institution for the <strong>2024/2025</strong> academic session. We are excited to welcome you to our
                institution and look forward to supporting you in your academic journey.</p>

            <div class="mt-3">
                <!-- note -->
                <h5 class="mt-2">NOTE:</h5>
                <p>Student should note that they must pay all fees at the commencement of registration in the
                    Institution Campus.</p>
                <p>For the purpose of registration, students are required to bring the following items along:</p>
                <ul>
                    <li>The original letter of provisional admission.</li>
                    <li>Original O level Result/Certificate(s) of Education qualification claimed.</li>
                    <li>Original Birth Certificate or statutory declaration of age.</li>
                    <li>Four (4) Passport Size Photographs.</li>
                    <li>Proof of State of origin signed by the Secretary of your Local Government.</li>
                </ul>
                <p>If you accept this offer, you are to resume on: <strong>Monday 12th August, 2024.</strong></p>
                <p>Please note that all your documents and claims submitted are subject to verification and any false
                    submission will lead to the withdrawal of the admission and possible sanction.</p>
                <p>Please note, this offer of Admission is not transferable to another academic session.</p>
                <p>Ceresense ICT Institution opens for the <strong>2024/2025</strong> academic session on <strong>Monday
                        12th August, 2024</strong> while orientation and registration for the fresher’s will commence
                    immediately. Please note that late registration will attract penalty.</p>
                <p>Please accept my congratulations.</p>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="mt-5">
            <p class="signature">_______________ <br>Dr. Jane Smith </p>
            <p>Head of Ceresense ICT Institution</p>
            <p>{{$current_Date}}</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endif
</body>

</html>

 
