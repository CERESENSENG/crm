<x-layout>
  <x-slot:title>
    Payments
  </x-slot:title>


<div class="container-fluid">
  <div class="row">
      <div class="col-12">
          <div class="card">
            <i class='fa-dolid fa-pen-to-square' style='font-size:36px'></i>
              <div class="card-body">
                  <h4 class="card-title">Payments</h4>
                           
                  <div class="table-responsive">
                      <table class="table table-striped table-bordered zero-configuration">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>App No</th>
                                  <th>Invoice</th>
                                  <th>Transaction Reference</th>
                                  <th>Amount</th>
                                  <th>Amount due</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($payments as $index => $payment )
                            <tr>
                              <td scope="row"> {{ $index + 1 }}</td>
                              <td> {{ $payment->student->firstname }} {{ $payment->student->surname }} </td>
                              <td>{{ $payment->student->app_no }}</td>
                              <td>{{$payment->invoice}}</td>
                              <td>{{ $payment->transaction_reference }} </td>
                              <td> &#8358;{{number_format($payment->amount) }} </td>
                              <td>&#8358;{{number_format($payment->amount_due) }} </td>
                              <td>{{ $payment->status }} </td>
                            </tr>
                            @endforeach

                          </tbody>
                          <tfoot>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>App No</th>
                                <th>Invoice</th>
                                <th>Transaction Reference</th>
                                <th>Amount</th>
                                <th>Amount-due</th>
                                <th>Status</th>
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