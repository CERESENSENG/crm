<x-layout>
    <x-slot:title>
        Department Page
    </x-slot>

    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card">
                <i class='fa-dolid fa-pen-to-square' style='font-size:36px'></i>
                  <div class="card-body">
                      <h4 class="card-title">Data Table</h4>
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered zero-configuration">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Department</th>
                                      <th>Department Code</th>
                                      <th>Duration</th>
                                      <th>HOD</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($depts as $index => $dept )
                                  
                                
                                <tr>
                                  <td scope="row"> {{ $index + 1 }}</td>
                                  <td>{{ $dept->name }} </td>
                                  <td>{{ $dept->department_code }}</td>
                                  <td>{{ $dept->duration }} </td>
                                  <td>{{ $dept->name }}</td>
                                  @foreach ($depts->user as $users)
                                  <td>{{ $user->name }}</td>
                                    
                                  @endforeach
                                 


                                  <td>
                                      <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#basicModal{{$dept->id}}">Edit</a>
                                      @include('department.edit')
                                      <a class="btn btn-danger" href="#" data-toggle="modal"
                                       data-target="#basicModal">Delete</a>
                                      
                                  </td>
                                </tr>
                                @endforeach

                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>Name</th>
                                      <th>Position</th>
                                      <th>Office</th>
                                      <th>Age</th>
                                      <th>Start date</th>
                                      <th>Salary</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>



</x-layout>
