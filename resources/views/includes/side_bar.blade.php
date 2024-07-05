  <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
          <div class="nk-nav-scroll">
              <ul class="metismenu" id="menu">
                  <li class="nav-label">Dashboard</li>
                  <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a href="{{route('admin')}}">Admin</a></li>
                      </ul>
                  </li>
                  <li class="mega-menu mega-menu-sm">
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Students</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a href="{{route('student.search')}}">Search</a></li>
                          <li><a href="{{ route('student.view') }}">View</a></li>
                          <li><a href="{{ route('student.enroll') }}">Enrol</a></li>
            
                      </ul>
                  </li>
                   <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Admission</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a  href="{{route('admission.show')}}">View</a></li>
                      </ul>
                  </li> 
                  <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Payments</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('view.payment') }}">View</a></li>
                        <li><a href="{{ route('search.payment') }}">Search</a></li>
                        <li><a href="{{ route('upload.page') }}">Upload Payments</a></li>
                        
                    </ul>
                </li> 
                  <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="icon-envelope menu-icon"></i> <span class="nav-text">Payment Schedule</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a href="{{ route('view.schedule') }}">View Schedule</a></li>
                          
                      </ul>
                  </li>
                   <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Departments</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a href="{{ route('viewall.dept') }}">View Department</a></li>
                         
                      </ul>
                  </li> 
                  <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="icon-menu menu-icon"></i><span class="nav-text">User</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a href="{{ route('viewall.user') }}" aria-expanded="false">View</a></li>
                      </ul>
                  </li>
                   <li>
                      <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                          <i class="icon-menu menu-icon"></i><span class="nav-text">Certification</span>
                      </a>
                      <ul aria-expanded="false">
                          <li><a href="{{ route('page.certificate') }}" aria-expanded="false">Upload</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
      <!--**********************************
          Sidebar end
      ***********************************-->