<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="index.html" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename"><img src="{{asset('assets/img/logo.png')}}" alt=""></h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.html" class="active">Home<br></a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="courses.html">Courses</a></li>
        <li><a href="trainers.html">Trainers</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="form.html">Defult Forms</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted" href="{{ route('home.page') }}">Get Started</a>

  </div>
</header>