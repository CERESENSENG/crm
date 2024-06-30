<x-layout>
    <x-slot:title>
        Confirm Page
    </x-slot>
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <div class="card-title"> Confirm Payment Data</div>
                    <form method="POST" action="{{ route('payment.storecsv') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <table class="table table-striped table-hover mt-3">
                            <tr>
                                <th>#</th>
                                {{-- <th>Name</th> --}}
                                <th>Invoice</th>
                                <th>Payment Reference</th>
                                <th>Amount</th>
                                <th>Amount-due</th>
                                <th>Status</th>
                                <th>Student ID</th>
                                <th>Comment(s)</th>
                            </tr>
                            @foreach ($confirms as $index => $confirm)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    {{-- <td>{{ $confirm->surname }} {{ $confirm->firstname }}</td> --}}
                                    <td>{{ $confirm->invoice }}</td>
                                     <td>{{ $confirm->payment_reference}}</td>  
                                    <td>{{ $confirm->amount }}</td>
                                    <td>{{ $confirm->amount_due }}</td>
                                    <td>{{ $confirm->status }}</td>
                                    <td>{!! $confirm->error_in_studentId ? '<span class="text-danger">' . $confirm->student_id . '</span>' : $confirm->student_id !!}</td>
                                    <td>{!! $confirm->error ? '<span class="text-danger">' . $confirm->comment . '</span>' : '<span class="text-success">' . $confirm->comment . '</span>' !!}</td>
                                
                                <!-- Hidden inputs -->
                                <input type="hidden" name="data[{{ $index }}][student_id]" value="{{ $confirm->student_id }}">
                                <input type="hidden" name="data[{{ $index }}][payment_option]" value="{{ $confirm->payment_option}}">
                                <input type="hidden" name="data[{{ $index }}][purpose]" value="{{ $confirm->purpose }}">
                                <input type="hidden" name="data[{{ $index }}][invoice]" value="{{ $confirm->invoice }}">
                                <input type="hidden" name="data[{{ $index }}][transaction_reference]" value="{{ $confirm->transaction_reference}}">
                                <input type="hidden" name="data[{{ $index }}][gateway]" value="{{ $confirm->gateway }}">
                                <input type="hidden" name="data[{{ $index }}][amount]" value="{{ $confirm->amount }}">
                                <input type="hidden" name="data[{{ $index }}][status]" value="{{ $confirm->status }}">
                                <input type="hidden" name="data[{{ $index }}][gateway_response]" value="{{ $confirm->gateway_response}}">
                                <input type="hidden" name="data[{{ $index }}][payment_date]" value="{{ $confirm->payment_date }}">
                                <input type="hidden" name="data[{{ $index }}][payment_reference]" value="{{ $confirm->payment_reference }}">
                                <input type="hidden" name="data[{{ $index }}][amount_due]" value="{{ $confirm->amount_due }}">
                                <input type="hidden" name="data[{{ $index }}][schedule_id]" value="{{ $confirm->schedule_id }}">


                            @endforeach
                        </table>
                        <div style="float:right">
                            @if (!$CSV_ERR)
                                <button type="submit" class="btn btn-success btn-large">Submit</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-layout>
