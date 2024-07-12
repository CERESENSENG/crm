<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admission</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    @if ($students)
        <div class="admission-logo-watermark text-center">
            <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo">
        </div>

        <div class="container p-3 p-md-4 p-lg-5 ">
            <!-- Header Section -->
            <div class="admission-header-section row">
                <div class="col-2 admission-logo">
                    <img src="{{ asset('assets/img/favicon.png') }}" alt="School Logo">
                </div>
                <div class="col-10 text-center">
                    <h1 class="school-name">Ceresense ICT Institution</h1>
                    <h5 class="school-address">N0 2,Foyeke street,opposite tawheed junction,basin,ilorin,kwara state
                    </h5>
                    <h6 class="school-website">Website: <a href="">www.ceresense.com.ng</a> | Contact: <span
                            class="school-contact">+234 7063419718, +234 8036436594</span></h6>
                </div>
            </div>
            <!-- date -->
            <div class="text-right mt-2">
                <h6>{{ $current_Date }}</h6>
            </div>

            <!-- Student Information Section -->
            <div class="student-info ">
                <img style="" width="100px" height="100px" src="{{ asset('upload/' . $students->passport) }}"
                    alt="">
                <p class="mb-0 mt-1"><strong>Name:</strong> {{ ucfirst(strtolower($students->firstname)) }}
                    {{ ucfirst(strtolower($students->surname)) }} {{ ucfirst(strtolower($students->othername)) }}</p>
                <p><strong>App No:</strong> {{ $students->app_no }}</p>
            </div>

            <!-- Main Letter Section -->
            <div class="mt-2">
                <h4 class="text-center">Provisional Admission Letter</h4>
                <p>Congratulations {{ ucfirst(strtolower($students->firstname)) }}
                    {{ ucfirst(strtolower($students->surname)) }}!
                    admitted to the Ceresense ICT Training Institute for the {{ $students->department->name }}.
                    Your application, with the registration application number {{ $students->app_no }}, has been
                    successfully processed.</p>

                <div class="mt-3">
                    <p>Please note that this admission is provisional and is contingent upon the completion of the
                        following requirements:</p>
                    <ol>
                        <li>Payment of Fees: You are required to make the necessary payment on or before [Payment
                            Deadline Date]. Please refer to the attached fee structure for detailed information.</li>
                        <li>Verification of Information: All information provided in your application will be verified.
                            Any discrepancies found may result in the cancellation of your admission.</li>
                    </ol>
                    <p>For any queries or further assistance, please feel free to contact our admissions office at
                        [07063419718 or 08036436594 or via email at info@ceresense.com.ng</p>
                    <p>
                        We look forward to welcoming you to the Ceresense ICT Training Institute and wish you success in
                        your academic endeavors.
                    </p>

                </div>
            </div>

            <!-- Footer Section -->
            <div class="mt-5">
                Sincerely,<br>
                Ceresense Admission offer


            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endif
</body>

</html>
