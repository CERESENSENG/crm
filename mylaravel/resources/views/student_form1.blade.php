<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}">
  <script src="{{asset('asset/js/bootstrap.js')}}"></script>
  <title>Document</title>
</head>
<body>
  <div class="container">
    <H2 style="text-align: center" class="display-5">Personal BIO</H2>
  </div>
  <div class="container mt-5">
    <form action="">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">FirstName</label>
        <input type="text" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">LastName</label>
        <input type="text" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">OtherName</label>
        <input type="text" class="form-control" id="exampleFormControlInput1">
      </div
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
        <input type="number" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Permanent Home <Address></Address></label>
        <input type="text" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Sponsor</label>
        <input type="text" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Sponsors Phone Number</label>
        <input type="number" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Next Of Kin</label>
        <input type="text" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Next Of Kin Phone Number</label>
        <input type="number" class="form-control" id="exampleFormControlInput1">
      </div>
      <div class="col">
        <a href="{{route('student_reg2')}}">
          <button type="button" class="btn btn-primary">Next</button>
        </a>
        
      </div>

    </form>
   
  </div>
  
</body>
</html>