<x-landing-page>

  <section id="hero" class="hero section">

    <img src="{{asset('assets/img/hero-bg.jpg')}}" class="" alt="" data-aos="fade-in">

    <div class="container">
      <h2 data-aos="fade-up" data-aos-delay="100">Learn Innovative<br>I.T Solutions</h2>
      <p data-aos="fade-up" class="ict_courses" data-aos-delay="200">Over 500+ ICT Courses</p>


      {{-- <div class="row">
        <div class=" col-md-8  col-lg-6">

          <div class="card card-custom " data-aos="fade-up" data-aos-delay="100">
            <div class="card-body">



              <ul class="list-group list-group-flush">
                <li class="list-group-item"><a data-bs-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">Program Overview</a></li>
                <div class="collapse" id="collapseExample">
                  <ul>
                    <li class="list-group-item" style="border: none;"><a href="#apply">Registration Steps</a></li>
                    <li class="list-group-item" style="border: none;"><a href="#student-login">Avaliable Program</a>
                    </li>
                  </ul>
                </div>
                <li class="list-group-item"><a href="{{ route('register.stage-1') }}">Click Here to Apply</a></li>
                <li class="list-group-item"><a href="login.html">Student Login</a></li>
                <li class="list-group-item"><a href="{{ route('login') }}">Admin Login</a></li>
              </ul>
            </div>
          </div>
        </div>


        
      </div> --}}

    
      @if(session('message'))
      <div class="alert alert-danger">
        {{ session('message') }}
      </div>
    
      @endif  
        <div class="row mt-3 mb-2">
          <div class=" col-md-8 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p  style="margin: 0;" data-aos-delay="100">Enter Application Number To Print Your Admission Letter
            </p>
            <form action="{{route('payment.details')}}" method="POST" class="app_number d-flex mt-1 mb-2"  data-aos-delay="300">

             @csrf
    
            @isset($appNo)
            
            <input name="app_no" value = "{{ $appNo }}" class="form-control" id="exampleDataList" placeholder="Type to search...">
            @else
            <input name="app_no" class="form-control" id="exampleDataList" placeholder="Type to search...">
            @endisset
              <input type="submit" class="btn btn-primary" value="submit">
            </form>
          </div>

        </div>
        <div class="row">
          <div class=" col-md-8 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p style="margin: 0;"  data-aos-delay="100">Enter Certificate Number 
            </p>
            <form action="#" class="app_number d-flex mt-1" data-aos-delay="300">
              <input type="text" class="form-control" placeholder="Certificate_No">
              <input type="submit" class="btn btn-primary" value="submit">
            </form>
          </div>
        </div>



      </div>



  

  </section> 


</x-landing-page>