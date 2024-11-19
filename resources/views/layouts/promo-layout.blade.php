<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> {{$title ??  'Ceresense Training Institute'}}  </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="ceresense Training Institute - ICT courses" />
        <meta name="keywords" content="ceresense, IT Training center in ilorin, ICT professional course in ilorin" />
        <meta content="ceresense" name="author" />

        <!-- fevicon -->
        <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">

        <!-- Bootstrap css -->
        <link rel="stylesheet" href="{{asset('promo/css/bootstrap.min.css')}}" type="text/css" />

        <!-- slider -->
        <link rel="stylesheet" href="{{asset('promo/css/swiper-bundle.min.css')}}" />

        <!-- animation -->
        <link rel="stylesheet" href="{{asset('promo/css/aos.css')}}" />

        <!-- Icon -->
        <link rel="stylesheet" href="{{asset('promo/css/materialdesignicons.min.css')}}" type="text/css" />

        <!-- css -->
        <link rel="stylesheet" href="{{asset('promo/css/style.min.css')}}" type="text/css" />

        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

        <style>

.js-select2 {
    height: 80px; /* Adjust this value to match the height of other form fields */
    padding-left: 35px; /* Provide space for the icon */
}

/* Fix for the Select2 container to match input field height */
.select2-container .select2-selection--multiple {
   /* height: 40px !important;  Match the height of the input field */
    padding-left: 35px !important; /* Space for the icon */
}

/* Prevent the placeholder text from overlapping the icon */
.select2-container--default .select2-selection--multiple .select2-selection__rendered {
    padding-left: 35px !important; /* Padding to avoid overlap with icon */
   /* line-height: 36px;  Ensure vertical alignment of placeholder */
}

/* Style for the selected items (course choices) */
.select2-container .select2-selection__choice {
    padding-left: 8px; /* Adjust padding for selected items */
    padding-right: 8px;
}

/* Style for the arrow button */


/* Adjust icon size */
.mdi {
    font-size: 18px; /* Ensure the icon fits well within the input */
    line-height: 36px; /* Center the icon vertically */
}

/* Ensure the Select2 dropdown has a consistent height */


</style>

    </head>

    <body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="71">

        <nav class="navbar navbar-expand-lg fixed-top navbar-white navbar-custom sticky" id="navbar">
            <div class="container">

                <!-- LOGO -->
                <a class="navbar-brand text-uppercase" href="/">
                    <img class="logo-light" src="{{url('assets/img/logo-white.png')}}" alt="" height="60">
                    <img class="logo-dark" src="{{url('assets/img/logo.png')}}" alt="" height="25">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="mdi mdi-menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mx-auto" id="navbar-navlist">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('promo.index')}}">Home</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{route('promo.register')}}">Enrol </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#review">Application Slip</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('index')}}">Programmes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-3 mb-lg-0" href="#contact">Contact</a>
                        </li>
                    </ul>
                    <!-- Button trigger modal -->
                    <a    href="{{route('promo.register')}}" class="btn btn-white nav-btn"   >
                        Register
                    </a>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="overflow-hidden-x">

        {{ $slot }}






<!-- Start cta -->
<section class="section cta">
    <marquee behavior="" direction="left"><p class="mb-0">
        Can’t join us in January? Stay tuned for the second half of the year! Our next cohort runs from June 12th to October 12th, with onboarding week beginning on June 12th. Hostel opens, classes start, and a new journey begins

    </p></marquee>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <div data-aos="fade-down" data-aos-duration="1800">
                    <div class="cta-heading">Unlock Your Career with Our Discounted Cohort Program!
                        {{-- <span class="mb-3">
                            <span class="counter_value" data-target="37">0</span>
                            <span>% Off</span>
                        </span>! --}}
                    </div>

                    <p>
                        Our exclusive program offers you the chance to complete 3 in-demand professional courses in just 6 months for a single payment at almost 99% off! You can choose from the following courses:
                        Web Development, UI/UX Design, Data Analysis, and Cybersecurity.
                    </p>

                        <!-- <p class="fs-18">Limited signup only. Order today before the discount period end.</p> -->
                        <a class="btn btn-primary" href="{{route('promo.register')}}"> Enrol Now for  {{ app('settings')['session']  }}
                             {{  (app('settings')['cohort']  ) ? 'January' : 'June' }}  Cohort </a>




                    </div>
            </div>
        </div>
    </div>
</section>
<!-- End cta -->

<!-- Start Team -->
<section class="section team" style="z-index: 1;">
    <div id="particles-js" style="z-index: -1;">
    </div>
    <!-- end particles -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center mb-5">
                    <h2 class="heading">Contact Us</h2>

                    <div class="content">
                        <h5 class="title"> Phone Numbers: </h5>
                        <p class="text-muted"> +234-7063-419-718, +234-8036-436-594
                        </p>

                    </div>

                    <div class="content">
                        <h5 class="title"> Office Address: </h5>
                        <p class="text-muted"> N0 2,Foyeke street,opposite tawheed junction,basin,ilorin,kwara state
                        </p>

                    </div>

                </div>




            </div><!-- end col-->
        </div><!-- end row -->

    </div><!-- end cotainer-->
</section>
<!-- End Team -->


<!-- START FOOTER -->
<footer class="section footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-10 text-center">
                <a href="javascript:void(0)"><img src="images/logo-light.png" height="24" alt=""></a>
                <p class="mx-auto mt-sm-4">
                    At Ceresense, we are committed to pushing the boundaries of technology to create innovative solutions that improve lives and drive business success.

                </p>
                <ul class="list-unstyled mb-0 mt-4 social-icon">
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-vimeo"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-google-plus"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><i class="mdi mdi-linkedin"></i></a></li>
                </ul>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-center mt-3">
                    <ul class="list-unstyled mb-0">
                        <li class="list-inline-item mx-lg-3 m-2">
                            <a class="text-white" href="javascript:void(0)">Home</a>
                        </li>
                        <li class="list-inline-item mx-lg-3 m-2">
                            <a class="text-white" href="javascript:void(0)">About us</a>
                        </li>
                        <li class="list-inline-item mx-lg-3 m-2">
                            <a class="text-white" href="javascript:void(0)"> FAQ</a>
                        </li>
                        <li class="list-inline-item mx-lg-3 m-2">
                            <a class="text-white" href="javascript:void(0)">Terms and Conditions</a>
                        </li>
                        <li class="list-inline-item mx-lg-3 m-2">
                            <a class="text-white" href="javascript:void(0)">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--end container-->
</footer>
<!-- END FOOTER -->


<!-- FOOTER-ALT -->
<div class="footer-alt pt-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <p class="mb-0 text-white fs-15">©
                        <script>document.write(new Date().getFullYear())</script> Ceresense
                         All Right Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


        <!--start back-to-top-->
        <button onclick="topFunction()" id="back-to-top">
            <i class="mdi mdi-arrow-up"></i>
        </button>
        <!--end back-to-top-->

        <!--Custom js-->
        <script src="{{asset('promo/js/counter.js')}}"></script>

        <!--Bootstrap Js-->
        <script src="{{asset('promo/js/bootstrap.bundle.min.js')}}"></script>

        <!-- animation -->
        <script src="{{asset('promo/js/aos.js')}}"></script>

        <script src="{{asset('promo/js/swiper-bundle.min.js')}}"></script>

        <!-- contact -->
        <script src="{{asset('promo/js/contact.js')}}"></script>

        <!-- Team particles-->
        <script src="{{asset('promo/js/particles.min.js')}}"></script>

        <!-- App Js -->
        <script src="{{asset('promo/js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        {{$customJs ?? ''}}

    </body>
</html>
