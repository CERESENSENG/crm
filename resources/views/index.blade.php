<x-landing-page>

  <section id="hero" class="hero section">

    <img src="assets/img/hero-bg.jpg" class="" alt="" data-aos="fade-in">

    <div class="container">
      <h2 data-aos="fade-up" data-aos-delay="100">Learn Innovative<br>I.T Solutions</h2>
      <p data-aos="fade-up" class="ict_courses" data-aos-delay="200">Over 500+ ICT Courses</p>


      <div class="row">
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
                @if (Route::has('login'))
                @auth
                <li class="list-group-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                 @else
                  <li class="list-group-item"><a href="{{ route('login') }}">Admin Login</a></li>
                  @endif
                @endauth
              </ul>
            </div>
          </div>
        </div>
        {{-- @if (Route::has('login'))
        @auth
            <a href="{{ url('admin') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                <h4>Dashboard</h4>
            </a>
        @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                <h4>Admin Login</h4>
            </a>
            <hr style="color: black">
        @endif
    @endauth --}}


        
      </div>

     



    </div>

  </section>  

</x-landing-page>