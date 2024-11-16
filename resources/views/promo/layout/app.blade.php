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
                            <a class="nav-link active" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Enrol </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#review">Application Slip</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">Programmes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-3 mb-lg-0" href="#contact">Contact</a>
                        </li>
                    </ul>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-white nav-btn" data-bs-toggle="modal" data-bs-target="#exampleModalLong">
                        Sign Up
                    </button>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        {{ $slot }}





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


        {{$customJs ?? ''}}

    </body>
</html>
