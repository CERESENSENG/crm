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
            <div class="row page-titles mx-0">
              <div class="col p-md-0">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                      <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                  </ol>
              </div>
          </div>
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