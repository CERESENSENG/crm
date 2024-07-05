<x-layout>
    <x-slot:title>
        Search
    </x-slot>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Search Payments</h4>
                        <div class="basic-form">
                            <form action="{{ route('search.payment') }}">

                                <div class="row">
                                    <div class="col">
                                        <label>Invoice</label>
                                        <input name="invoice" type="text" class="form-control">
                                    </div>

                                    <div class="col">
                                        <label>Payment Option</label><select style="width:95%" id="payment_option"
                                            name="payment_option" class="form-control">
                                            <option id="payment_option" value=''>Select Payment Option</option>
                                            @foreach ($options as $option)
                                                <option value="{{ $option }} ">{{ $option }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col">
                                        <label>Status</label>
                                        <select id="status" name="status" class="form-control">
                                            <option id="status" value=''>Select Status</option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status }}">{{ $status }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group col">
                                        <label>From</label>
                                        <input name="from" type="date" class="form-control">
                                    </div>
                                    <div class="form-group col">
                                        <label>To</label>
                                        <input name="to" type="date" class="form-control">
                                    </div>


                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
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
                                        <th scope="col">App No</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Transaction Reference</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Amount due</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($studentList as $index => $student)
                                        <tr>
                                            <td scope="row"> {{ $index + 1 }}</td>
                                            <td> {{ $student->student->firstname }} {{ $student->student->surname }}
                                            </td>
                                            <td>{{ $student->student->app_no }}</td>
                                            <td>{{ $student->invoice }}</td>
                                            <td>{{ $student->transaction_reference }} </td>
                                            <td>{{ $student->amount }} </td>
                                            <td>{{ $student->amount_due }} </td>
                                            <td>{{ $student->status }} </td>
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
    </div>


</x-layout>
