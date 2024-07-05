<x-pages-layout>
    <x-slot:title>
        Outstanding Payment :: Carts
    </x-slot:title>

    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-8 col-lg-9">
                <div class="card mt-2">
                    <div class="card-header bg-secondary text-white">Outstanding Payment Details</div>
                    <div class="card-body">
                        <form id="paymentForm" action="{{ route('confirm.paymentcart') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="application-number" class="form-label">Application Number</label>
                                <input name="appNo" value="{{ $stdApp }}" class="form-control" type="text"
                                    id="application-number" placeholder="" aria-label="Disabled input example" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="email-address" class="form-label">Email address</label>
                                <input name="email" value="{{ $email }}" class="form-control" type="email"
                                    id="email-address" placeholder="" aria-label="Disabled input example" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount Paid Before(&#8358;)
                                </label>
                                <input name="Amount_paid" id="amount" value="{{ $amount_paid }}"
                                    type="text" class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount Due (&#8358;)
                                </label>
                                <input name="amount_left" id="amount" value="{{ $amount_left }}" type="text"
                                    class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="amount-to-pay" class="form-label">Amount To Pay (&#8358;)</label>
                                <input name="amount_to_pay" id="amount-to-pay" value="" type="text"
                                    class="form-control">
                                <div id="amount-error" class="text-danger" style="display:none;">Please enter a valid amount in
                                    the format 1234567890.99</div>
                            </div>
                            {{-- <input type="hidden" name="department_id" value="{{ $deptId }}">  --}}
                            {{-- <input name="purpose" type="hidden" value="{{ $purpose }}"> --}}
                            {{-- <input name="schedule_id" type="hidden" value="{{ $schedule_id }}"> --}}
                            {{-- <input name="student_id" type="hidden" value="{{ $student_id }}"> --}}
                            <input name="app_no" type="hidden" value="{{ $stdApp }}">
                            <input name="email" type="hidden" value="{{ $email }}">
                            <input name="inv" type="hidden" value="{{ $inv }}">
                            <input type="hidden" name="amount_paid" value="{{ $amount_paid}}">
                            <input type="hidden" name="amount_left" value="{{ $amount_left }}">
                            <input type="hidden" name="amount_due" value="{{ $amount_due }}">
                            <input name="purpose" type="hidden" value="{{$purpose}}">
                           
        
                            <button type="submit" class="btn btn-primary">Proceed</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        
    </div>


</x-pages-layout>
