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
                  {{-- <div class="mb-3">
                      <label for="transaction-reference" class="form-label">Transaction Reference</label>
                      <input name="Transaction_reference" value="{{ $txn }}" type="text" id="transaction-reference"
                          class="form-control" disabled>
                  </div> --}}
                  <div class="mb-3">
                    <label for="amount" class="form-label">Amount Paid Before</label>
                    <input name="Amount_paid_before" id="amount" value="{{ $amountPaidBefore }}" type="text" class="form-control" disabled>
                </div>
                  <div class="mb-3">
                      <label for="amount" class="form-label">Amount Due</label>
                      <input name="amount_due" id="amount" value="{{ $amountDue }}" type="text" class="form-control" disabled>
                  </div>
                  <div class="mb-3">
                      <label for="amount-to-pay" class="form-label">Amount To Pay</label>
                      <input name="amount_to_pay" id="amount-to-pay" value="" type="text" class="form-control">
                      <div id="amount-error" class="text-danger" style="display:none;">Please enter a valid amount in the format 1234567890.99</div>
                  </div>
                  {{-- Hidden input  --}}
                   <input name="student_id" type="hidden" value="{{ $student_id }}"> 
                   <input name="app_no" type="hidden" value="{{ $app_no }}">
                  <input name="email" type="hidden" value="{{ $email}}">  
                  <input name="inv" type="hidden" value="{{$inv}}">
                  <input name="schedule_id" type="hidden" value="{{$schedule_id}}">
                  <input name="purpose" type="hidden" value="{{$purpose}}">
                  {{-- <input name="txn" type="hidden" value="{{$txn}}"> --}}
                  <input type="hidden" name="department_id" value="{{ $deptId }}">
                  <input type="hidden" name="amount_due" value="{{ $amountDue }}"> 
                  <input type="hidden" name="amount_paid_before" value="{{ $amountPaidBefore }}"> 
                  

                  <button type="submit" class="btn btn-primary">Proceed</button>
              </form>
          </div>
      </div>
  </div>

</x-pages-layout>
