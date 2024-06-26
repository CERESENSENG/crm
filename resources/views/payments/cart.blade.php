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
  </div>
</div>
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
  
  
</x-pages-layout>
