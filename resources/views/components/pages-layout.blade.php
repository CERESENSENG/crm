<!DOCTYPE html>
<html lang="en">
@include('include_pages.head')
<body class="about-page">
    @include('include_pages.header')
    <main class="main">
        <div class="page-title" data-aos="fade">
      
            <nav class="breadcrumbs">
              <div class="container">
                <ol>
                  <li><a href="{{ route('index') }}">Home</a></li>
                  <li  class="current"><a href="{{ route('about.page') }}">About Us</a><br></li>
                </ol>
              </div>
            </nav>
          </div>
          <section id="about-us" class="section about-us">
            {{ $slot }}
          </section>

    </main>
    @include('include_pages.footer')

    @include('include_pages.scripts')
    
</body>
</html>