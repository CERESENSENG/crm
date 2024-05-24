<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
  @include('includes.pre_loader')
  <div id="main-wrapper">
    @include('includes.nav_header')
    @include('includes.side_bar')

       <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

          <div class="container-fluid mt-3">
            {{$slot}}
             
          </div>
          <!-- #/ container -->
        </div>
      <!--**********************************
          Content body end
      ***********************************-->
    @include('includes.footer')
  </div>
  @include('includes.scripts')

  
</body>
</html>