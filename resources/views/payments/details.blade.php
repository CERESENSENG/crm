<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
  <script src="{{ asset('asset/js/bootstrap.js') }}" defer></script>
</head>
<body>
  <div class="container">
    @if(session('message'))
    <div class="alert alert-danger">
      {{ session('message') }}
    </div>
  
    @endif
    <form action="{{ route('payment.details') }}" method="POST">
      @csrf
      <label  for="exampleDataList" class="form-label">Enter application number</label>
      <input name="app_no" class="form-control" id="exampleDataList" placeholder="Type to search...">
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
  
</body>
</html>

