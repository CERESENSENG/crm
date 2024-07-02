{{-- <x-card>
  <div class="container">
    @if (session('message'))
    <div class="alert alert-danger">
      {{ session('message') }}
    </div>
      
    @endif
    @if (session('message'))
    <div class="alert alert-danger">
      {{ session('message') }}
    </div>
      
    @endif

    <form action="{{ route('payment.init') }}" method="POST">
      @csrf
    <div class="mb-3">
      <label for="email-address" class="form-label">Email address</label>
      <input name="email" value="{{ $students }}" class="form-control" type="email" id="email-address" placeholder="" aria-label="Disabled input example" readonly>
    </div>
    <input name="student_id"  type="hidden" value="{{ $student_id }}">
      <input name="inv"  type="hidden" value="{{$inv}}"> 
        <input name="purpose"  type="hidden" value="{{$purpose}}"> 
      <input type="hidden"  name="department_id"  value="{{ $deptId }}">
    <div class="mb-3">
      <label for="transaction-reference" class="form-label">Transaction Reference</label>
      <input   name="transaction_reference" value="{{ $txn }}" type="text" id="transaction-reference" class="form-control" readonly>
    </div>
    <div class="mb-3">
      <label for="amount" class="form-label">Amount</label>
      <input  name="amount" id="amount" value="{{$schedule }}" type="text" class="form-control" readonly>
    </div>
    <div class="mb-3">
      <label for="payment-option" class="form-label">Payment Option</label>
      <select  name="payment_option"  class="form-select" id="payment_option" aria-label="Default select example" required>
        <option value=""  selected>Select Payment Option</option>
        <option  value="half_payment">Half payment</option>
        <option   value="full_payment">Full payment</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Proceed</button>
  </form> 
  </div>

   <script>
    let amount=document.getElementById('amount');
    let option=document.getElementById('payment_option');
    let schedule=parseFloat("{{ $schedule }}")

    function choose(){
      if(option.value=='half_payment'){
        amount.value=(schedule/2).toFixed(2);

      }else if(option.value=='full_payment'){
        amount.value=schedule.toFixed(2);
      }
      else{
        amount.value=schedule.toFixed(2);
      }
    }
    // choose();
    option.addEventListener('change', choose);








  </script> 
</x-card> --}}

<x-pages-layout>
  <x-slot:title>
    Payment :: Carts
  </x-slot:title>

  <div class="container">
    <div class="card mt-2">
        <div class="card-header bg-secondary text-white">Payment Cart</div>
        <div class="card-body">
      @if (session('message'))
      <div class="alert alert-danger">
        {{ session('message') }}
      </div>
        
      @endif
      @if (session('message'))
      <div class="alert alert-danger">
        {{ session('message') }}
      </div>
        
      @endif
  
      <form action="{{ route('payment.init') }}" method="POST">
        @csrf
      <div class="mb-3">
        <label for="email-address" class="form-label">Email address</label>
        <input name="email" value="{{ $students }}" class="form-control" type="email" id="email-address" placeholder="" aria-label="Disabled input example" readonly>
      </div>
      <input name="student_id"  type="hidden" value="{{ $student_id }}">
        <input name="inv"  type="hidden" value="{{$inv}}"> 
          <input name="purpose"  type="hidden" value="{{$purpose}}"> 
        <input type="hidden"  name="department_id"  value="{{ $deptId }}">
        <input type="hidden"  name="amount_due"  value="{{ $amount_due }}">
      <div class="mb-3">
        <label for="transaction-reference" class="form-label">Transaction Reference</label>
        <input   name="transaction_reference" value="{{ $txn }}" type="text" id="transaction-reference" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input  name="amount" id="amount" value="{{$schedule }}" type="text" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label for="convenient_charges" class="form-label">Convenient Charges</label>
        <input id="convenient_charges" name="convenient_charges" type="text" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label for="payment-option" class="form-label">Payment Option</label>
        <select  name="payment_option"  class="form-select" id="payment_option" aria-label="Default select example" required>
          <option value=""  selected>Select Payment Option</option>
          <option  value="half_payment">Half payment</option>
          <option   value="full_payment">Full payment</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Proceed</button>
    </form> 
    </div>
  </div>
</div>
</div>

 
<script>
 let amount = document.getElementById('amount');
    let option = document.getElementById('payment_option');
    let convenientChargesInput = document.getElementById('convenient_charges');
    let schedule = parseFloat("{{ $schedule }}");

    function choose() {
      let selectedAmount = schedule;

      if (option.value == 'half_payment') {
        selectedAmount = schedule / 2;
      } else if (option.value == 'full_payment') {
        selectedAmount = schedule;
      }

      amount.value = selectedAmount.toFixed(2);

      let totalAmount;
      if (selectedAmount > 2500) {
        totalAmount = selectedAmount / (1 - (1.5 / 100)) + 100;
      } else {
        totalAmount = selectedAmount / (1 - (1.5 / 100)) + 0.03;
      }

      let convenientCharges = totalAmount - selectedAmount;
      if (convenientCharges > 2000) {
        convenientCharges = 2000;
      }

      convenientChargesInput.value = convenientCharges.toFixed(2);
    }

    option.addEventListener('change', choose);
</script> 
  
  
</x-pages-layout>
