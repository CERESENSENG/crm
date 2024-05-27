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
    <H2 style="text-align: center" class="display-5">Course Details</H2>
  </div>
  <div class="container">
    <div class="row">
      <div class="col">
        <form action="">
          <select class="form-select mb-3" aria-label="Default select example">
            <option selected>Course Of Choice</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload</label>
            <input type="file" class="form-control" id="inputGroupFile01">
          </div>
          <label class="mb-2" for="">Prefered Class Method</label> <br>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">Physical Class</label>
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Online Class</label>
          </div><br>
          <label class="mb-2 mt-2" for="">Skill Monetization</label> <br>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">No</label>
          </div> <br>
          <label class="mb-2 mt-2" for="">Method Of Payment</label> <br>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">One Time Payment</label>
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Installments</label>
          </div>
          <br>
          <label class="mb-2 mt-2" for="">Hostel Accomodation</label> <br>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">No</label>
          </div>
          <br>
          <label class="mb-2 mt-2" for="">School Wifi</label> <br>
          <div class="form-check form-check-inline">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">No</label>
          </div>
         
        </form>

      </div>

    </div>
   
  </div>
  
</body>
</html>