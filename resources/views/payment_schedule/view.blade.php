<x-layout>
<x-slot:title>
  Payments Schedule
</x-slot:title>

<div class="container-fluid">
  <div class="row">
      <div class="col-12">
          <div class="card">
            <i class='fa-dolid fa-pen-to-square' style='font-size:36px'></i>
              <div class="card-body">
                  <h4 class="card-title">Payments Schedule</h4>
                
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#basicModalSchedule">Add New Schedule</a>
                     @include('payment_schedule.create')

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
                                  <th>Cohort</th>
                                  <th>Year</th>
                                  <th>Department Name</th>
                                  <th>Amount</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($payments as $index => $payment )

                            
                            <tr>
                              <td scope="row"> {{ $index + 1 }}</td>
                              <td>{{ $payment->cohort }} </td>
                              <td>{{ $payment->year }}</td>
                              <td>{{ $payment->department->name }} </td>
                              <td>{{ $payment->amount}}</td>
                              <td>
                                 <div style="display: flex ;">
                                    <a class="" href="#" data-toggle="modal" data-target="#basicModalSchedule{{$payment->id}}"> <i class='fas fa-edit' style='font-size:20px'></i></a>
                                  @include('payment_schedule.edit')
                                  <a style="margin-left: 10px" class="" href="#" data-toggle="modal"
                                   data-target="#basicModalDelete{{$payment->id}}"><i class='fas fa-trash-alt' style='font-size:20px;color:red'></i></a>
                                   @include('payment_schedule.delete') 
                                </div>
                                  
                                  
                              </td>
                            </tr>
                            @endforeach

                          </tbody>
                          <tfoot>
                              {{-- <tr>
                                  <th>Name</th>
                                  <th>Position</th>
                                  <th>Office</th>
                                  <th>Age</th>
                                  <th>Start date</th>
                                  <th>Salary</th>
                              </tr> --}}
                          </tfoot>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

</x-layout>
