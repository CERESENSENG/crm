<!-- resources/views/success.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <script src="{{ asset('asset/js/bootstrap.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="ms-2" src="/asset/images/ceresense_logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
            </button>
        </div>
    </nav>
    <div class="container">
        <div class="card mt-2">
            <div class="card-header bg-success text-white">Success</div>
            <div class="card-body">
                @if($student)
                <p>Hi {{ $student->surname }} {{ $student->firstname }} you have registered succesfully</p>
                <p>Your application details have been sent to your email</p>
            @else
                <p>No student found.</p>
            @endif
            <a href="{{ route('applicationSlip') }}?app_no={{ urlencode($student->app_no) }}">
                <button type="button" class="btn btn-success">Print application slip</button>
            </a>
            </div>
        </div>
    </div>
</body>
</html>
