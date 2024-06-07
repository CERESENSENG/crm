<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <script src="{{ asset('asset/js/bootstrap.js') }}"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;


        }

        .main {
            background-image: url(asset/images/image.jpg);
            height: 150vh;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .learn {
            color: blueviolet;
            font-size: 50px
        }

        .it {
            color: blueviolet;

        }

        .navigation {
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 10px;

        }

        .reg .navigation a h4 {
            color: white;
            padding-left: 10px
        }

        .navigation a {
            text-decoration: none
        }

        /* .navigation a h4{
                color: blueviolet;
            } */
        .navigation a h4:hover {
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="ms-2" src="asset/images/ceresense_logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid main">
        <div class="row">
            <div class="col">
                <div class="pt-5 container">
                    <h1 class="learn fw-bold">Learn Inovative</h1>
                    <h6 class="learn fw-bold it">I.T Solution</h6>
                    <p class="display-3 fw-medium">Over 500+ ICT Courses </p>

                </div>
            </div>

        </div>
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="navigation container">
                        <a href="#">
                            <h4 class="pt-2">Registration Steps</h4>
                        </a>
                        <hr style="color: black">
                        <a href="{{route('register.page1')}}">
                            <h4>Click here to apply</h4>
                        </a>
                        <hr style="color: black">
                        <a href="#">
                            <h4>Student Login</h4>
                        </a>
                        <hr style="color: black">
                        @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <h4>Dashboard</h4>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <h4>Admin Login</h4>
                            </a>
                            <hr style="color: black">
                            @if (Route::has('register'))
                                {{-- <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                    <h4>Register</h4>
                                </a> --}}
                            @endif
                        @endauth
                    @endif
                        {{-- <a href="#">
                            <h4>Admin Login</h4>
                        </a> --}}
                        {{-- <hr style="color: black"> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>



</body>

</html>
