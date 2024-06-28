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
                      <h4 class="card-title">Departments Table</h4>
                    
                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#basicModalCreate">Add New Department</a>
                        @include('department.create')

                        @if(session('message'))
                        <div class="alert alert-success mt-3">
                          {{ session('message') }}
                        </div>
                        @elseif (session('Success'))
                      <div class="alert alert-success mt-3">
                        {{ session('Success') }}

                      </div>
                      @elseif (session('confirm'))
                      <div class="alert alert-success mt-3">
                        {{ session('confirm') }}

                      </div>
                          
                        @endif
                     
                     
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
                                  <td>{{ $dept->hod->name }}</td>
                                  <td>
                                    <div style="display: flex ;">
                                        <a class="" href="#" data-toggle="modal" data-target="#basicModal{{$dept->id}}"> <i class='fas fa-edit' style='font-size:20px'></i></a>
                                      @include('department.edit')
                                      <a style="margin-left: 10px" class="" href="#" data-toggle="modal"
                                       data-target="#basicModalDelete{{$dept->id}}"><i class='fas fa-trash-alt' style='font-size:20px;color:red'></i></a>
                                       @include('department.delete')
                                    </div>
                                      
                                      
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
