 {{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <script src="{{ asset('asset/js/bootstrap.js') }}"></script>
    <title>Document</title>
    <style>
        .struct {
            display: flex;
            align-items: center;

        }


        .cere {
            color: blueviolet;
            font-size: 50px;
        }

    </style>
</head>

<body class="">

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="text-center mt-4">
                    <img height="30%"  src="/asset/images/ceresense_logo.png" alt="">
                    <h6><a href="">www.ceresense.com.ng</a></h6>
                    <h6 class="fw-light">No 2,foyeke street,opposite tawheed junction, basin, ilorin, kwara state.</h6>
                    <h6 class="display-6">Application Slip</h6>
                </div>
            </div>
            <h1>Applicant information</h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
             <div class="col-10">
                <div style="overflow-x: hidden" class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>

                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>



                            <tr>
                                <td>
                                    <div class="struct">
                                        <h5>Firstname:</h5>
                                        <h4 class="ms-3 fw-light">{{ $student->firstname }} </h4>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <div class="struct">
                                        <h5>Surname:</h5>
                                        <h4 class="ms-3 fw-light">{{ $student->surname }} </h4>
                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <div class="struct">
                                        <h5>Othername:</h5>
                                        <h4 class="ms-3 fw-light">{{ $student->othername }} </h4>
                                    </div>


                                </td>

                            </tr>
                            <tr>
                                <td>

                                    <div class="struct">
                                        <h5>Application Number:</h5>
                                        <h4 class="ms-3 fw-light">{{ $student->app_no }} </h4>
                                    </div>


                                </td>

                            </tr>
                            <tr>
                                <td>

                                    <div class="struct">
                                        <h5>Method Of Payment:</h5>
                                        <h4 class="ms-3 fw-light">{{ $student->payment_method }} </h4>
                                    </div>


                                </td>

                            </tr>
                     
                            <tr>
                                <td>

                                    <div class="struct">
                                        <h5>Email Address:</h5>
                                        <h4 class="ms-3 fw-light">{{ $student->email }} </h4>


                                    </div>


                                </td 
                            </tr>
                            <tr>
                                <td>

                                    <div class="struct">
                                        <h5>Course Applied:</h5>
                                        <h4 class="ms-3 fw-light">{{ $student->department->name }} </h4>


                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <div class="struct">
                                        <h5>Next of Kin:</h5>
                                        <h4 class="ms-3 fw-light">{{ $student->next_of_kin }} </h4>


                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <div class="struct">
                                        <h5>Next of Kin Phone Number:</h5>
                                        <h4 class="ms-3 fw-light">{{ $student->next_of_kin_phone }} </h4>


                                    </div>


                                </td>
                            </tr>
                            <tr>
                                <td>

                                    <div class="struct">
                                        <h5>Permanent Address:</h5>
                                        <h4 class="ms-3 fw-light">{{ $student->address }} </h4>


                                    </div>


                                </td>
                            </tr>  

                        </tbody>
                    </table>



                </div>

            </div>
            <div class="col-2">
                <img style="" width="100px" height="100px" src="{{ asset('upload/' . $student->passport) }}"
                    alt="">


            </div>
        </div>

    </div>



</body>

</html> 
 --}}

 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- Main CSS File -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* admission page style */
        .admission-header-section {
            border-bottom: 8px double blue;
            padding-bottom: 10px;
        }

        .school-name {
            color: #1691f1;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .school-address {
            color: rgb(223, 20, 20);
        }

        .school-contact {
            color: rgb(85, 83, 83);
        }

        .admission-logo img {
            max-width: 120px;
        }

        .admission-logo-watermark img {
            position: absolute;
            max-width: 50%;
            z-index: 999;
            opacity: 0.1;
            left: 25%;
            top: 60%;
        }

        .student-info {
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 25px;
            
        }

        .student-info img {
            width: 130px;
            max-height: 140px;
            object-fit: cover;
        }

        .signature {
            margin-top: 50px;
        }

        .info-item {
            font-size: 19px;
            margin: 35px;
        }

        @media (max-width: 800px) {
            .admission-logo img {
                max-width: 100px;
            }

            .school-name {
                font-size: 30px;
            }

            .school-address {
                font-size: 19px;
            }

            .info-item {
            font-size: 18px;
            margin: 30px;
        }
        }

        @media (max-width: 650px) {
            .admission-logo img {
                max-width: 80px;
            }

            .school-name {
                font-size: 26px;
            }

            .school-address {
                font-size: 17px;
            }

            .info-item {
            font-size: 16px;
            margin: 20px;
        }
        }

        @media (max-width: 450px) {
            .admission-logo img {
                max-width: 60px;
            }

            .school-name {
                font-size: 22px;
            }

            .school-address {
                font-size: 15px;
            }

            .school-website {
                font-size: 13px;
            }

            .info-item {
            font-size: 14px;
            margin: 10px;
        }
        }

        @media print {
            .admission-logo-watermark {
                z-index: -1;
            }

            .admission-logo-watermark img {
            position: absolute;
            max-width: 50%;
            z-index: 999;
            opacity: 0.1;
            left: 25%;
            top: 20%;
        }

        }
    </style>
</head>

<body>
    <div class="admission-logo-watermark text-center">
        <img src="{{asset('assets/img/favicon.png')}}" alt="Logo">
    </div>

    <div class="container">

        <!-- header section -->
        <div class="container-fluid">
            <div class="admission-header-section row">
                <div class="col-2 admission-logo">
                    <img src="{{asset('assets/img/favicon.png')}}" alt="School Logo">
                </div>
                <div class="col-10 text-center">
                    <h1 class="school-name">Ceresense ICT Institution</h1>
                    <h5 class="school-address">No 2,foyeke street,opposite tawheed junction, basin, ilorin, kwara state.</h5>
                    <h6 class="school-website">Website: <a href="">www.ceresense.com.ng</a> | Contact: <span
                            class="school-contact">+234 7063419718, +234 8036436594</span></h6>
                </div>
            </div>
        </div>

        <!-- date -->
        <div class="text-right mt-2">
            <h6>24th June 2024</h6>
        </div>

       
        <!-- main student information -->
        <div class="m-0">


             <!-- Student avatar Section -->
        <div class="student-info">
            <img style="" width="100px" height="100px" src="{{ asset('upload/' . $student->passport) }}"
            alt="">
        </div>
        <!-- end student avatar section -->




            <div class="row">
                <div class="col-12">
                    <div class="info-item"><strong>Firstname:</strong> {{ucfirst(strtolower($student->firstname) )}}</div>
                    <div class="info-item"><strong>Surname:</strong> {{ucfirst(strtolower( $student->surname ))}}</div>
                    <div class="info-item"><strong>Othername:</strong> {{ ucfirst(strtolower( $student->othername ))}}</div>
                    <div class="info-item"><strong>Application Number:</strong> {{ $student->app_no }}</div>
                    <div class="info-item"><strong>Method Of Payment:</strong> {{ $student->payment_method }}</div>
                    <div class="info-item"><strong>Email Address:</strong> {{ $student->email }}</div>
                    <div class="info-item"><strong>Course Applied:</strong> {{ $student->department->name }}</div>
                    <div class="info-item"><strong>Next of Kin:</strong> {{ $student->next_of_kin }}</div>
                    <div class="info-item"><strong>Next of Kin Phone Number:</strong> {{ $student->next_of_kin_phone }}</div>
                    <div class="info-item"><strong>Permanent Address:</strong> {{ $student->address }}</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

