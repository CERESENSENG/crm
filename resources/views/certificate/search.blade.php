<x-layout>
<x-slot:title>
  Certificate :: Search
</x-slot:title>

<div class="container-fluid">
  <div class="row">

      <div class="col-lg-12">

          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Search Certificate</h4>
                  <div class="basic-form">
                      <form action="{{ route('search.certificate') }}" method="GET" enctype="multipart/form-data">

                          <div class="row">
                              <div class="col">
                                  <label>Matric No</label>
                                  <input name="matric_no" type="text" class="form-control">
                              </div>

                              <div class="col">
                                  <label>Year</label>
                                  <input name="year" type="text" class="form-control">
                              </div>

                              <div class="col">
                                <label>Certificate No</label>
                                <input name="certificate_no" type="text" class="form-control">
                            </div>

                              


                          </div>
                          <button type="submit" class="btn btn-primary mt-3">Search</button>
                      </form>
                  </div>
              </div>
          </div>
          <div class="">

              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title"></h4>
                      <table class="table table-striped table-hover">
                          <thead>
                              <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Matric No</th>
                                  <th scope="col">Admission Year</th>
                                  <th scope="col">Department</th>
                                  <th scope="col">Certificate No</th>     
                              </tr>
                          </thead>
                          <tbody>

                            @foreach($studentCert as  $index => $student)
                              
                                  <tr>
                                    <td>{{$index + 1 }}</td>
                                      <td scope="row">{{ ucfirst(strtolower($student->surname)) }}
                                        {{ ucfirst(strtolower($student->firstname)) }}
                                        {{ ucfirst(strtolower($student->othername)) }}</td>
                                      <td><a href="{{ route('applicant.FullDetails') }}? app_no={{ urlencode($student->app_no) }}">{{ $student->app_no }}</a></td>
                                      <td>{{ $student->admission_year }}</td>
                                      <td>{{ $student->department->name }}</td>
                                      <td>{{ $student->certificate_no }}</td>
                                      
                                  </tr>

                                  @endforeach
                              
                          </tbody>
                      </table>


                  </div>
              </div>
          </div>



      </div>






  </div>



</div>


</x-layout>