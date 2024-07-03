<x-pages-layout>
  <x-slot:title>
      Outstanding Payment :: Carts
  </x-slot:title>

  <div class="container">
    <div class="card mt-2">
        <div class="card-header bg-secondary text-white">Outstanding Payment Details</div>
        <div class="card-body">
            <form id="paymentForm" action="{{ route('payment.outstandingInit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="application-number" class="form-label">Application Number</label>
                    <input name="appNo" value="{{$app_no}}" class="form-control" type="text" id="application-number"
                        placeholder="" aria-label="Disabled input example" disabled>
                </div>
                <div class="mb-3">
                    <label for="email-address" class="form-label">Email address</label>
                    <input name="Email" value="{{ $email }}" class="form-control" type="email" id="email-address"
                        placeholder="" aria-label="Disabled input example" disabled>
                </div>
                <div class="mb-3">
                  <label for="amount" class="form-label">Amount Paid Before (&#8358;)</label>
                  <input name="amount_paid" id="amount" value="{{ $amount_paid }}" type="text" class="form-control" disabled>
              </div>
              <div class="mb-3">
                <label for="amount" class="form-label">Amount Due (&#8358;)</label>
                <input name="amount_left" id="amount" value="{{ $amount_left}}" type="text" class="form-control" disabled>
            </div>
              <div class="mb-3">
                <label for="amount" class="form-label">Convinienence Charges (&#8358;)</label>
                <input name="amount_due" id="amount" value="{{ $convinienceFees}}" type="text" class="form-control" disabled>
            </div>
               
                <div class="mb-3">
                    <label for="amount-to-pay" class="form-label">Amount To Pay (&#8358;)</label>
                    <input name="amount_to_pay" id="" value="{{$amountToPaystack  }}" type="text" class="form-control" disabled>
                    <div id="amount-error" class="text-danger" style="display:none;">Please enter a valid amount in the format 1234567890.99</div>
                </div>
                {{-- Hidden input  --}}
                 
                 <input name="app_no" type="hidden" value="{{ $app_no }}">
                <input name="email" type="hidden" value="{{ $email}}">  
                <input name="inv" type="hidden" value="{{$inv}}">
                <input name="purpose" type="hidden" value="{{$purpose}}">
                <input type="hidden" name="amount_left" value="{{ $amount_left}}">
                <input type="hidden" name="amount_paid" value="{{ $amount_paid}}">
                <input type="hidden" name="amount_due" value="{{ $amount_due }}">
                <input type="hidden" name="actual_amount"   value="{{ $actual_amount }}">
                <input type="hidden" name="amount_to_paystack" value="{{ $amountToPaystack}}">
                
                {{-- <input name="schedule_id" type="hidden" value="{{$schedule_id}}"> --}}
                {{--  --}}
                {{-- <input type="hidden" name="department_id" value="{{ $deptId }}"> --}}
                {{-- <input name="student_id" type="hidden" value="{{ $studentId}}">         
                <input type="hidden" name="amount_to_pay" value="{{ $amount_to_pay}}">  
                <input type="hidden" name="amount_to_paystack" value="{{ $amountToPaystack}}">
                <input type="hidden" name="amount_paid_before" value="{{ $total_amount_paid_before}}">  --}}
                

                <button type="submit" class="btn btn-primary">Proceed</button>
            </form>
        </div>
    </div>
</div>


</x-pages-layout>
