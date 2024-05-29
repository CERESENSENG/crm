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
    <div class="container">
        <div class="card">
            <div class="card-header bg-success text-white">Success</div>
            <div class="card-body">
               
              <p>{{(Session::get('success'))}}</p>
             
            </div>
        </div>
    </div>
</body>
</html>
