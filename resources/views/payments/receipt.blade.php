
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
  <title>Document</title>
</head>
<body>
  <div class="container-fluid">
    <div class="row ">
      <div class="col">
          <div class="text-center mt-4">
              <img height="30%"  src="/asset/images/ceresense_logo.png" alt="">
              <h6><a href="">www.ceresense.com.ng</a></h6>
              <h6 class="fw-light">No 2,foyeke street,opposite tawheed junction, basin, ilorin, kwara state.</h6>
              <h6 class="display-6">Payment Slip</h6>
          </div>
      </div>
  </div>
    <div class="row mt-5">
      <div class="col">
        <address>
          <strong>Billed To:</strong><br>
          {{ $student->firstname }} {{ $student->othername }} {{ $student->surname }}<br>
          <strong>Aplication No:</strong> {{ $student->app_no}}<br>
          <strong>Cohorts:</strong> {{ $student->cohort}}<br>
          <strong>Admission Year:</strong>{{ $student->admission_year }}<br>
        </address>
      </div>
      <div style="margin-left: 40%" class="col text-md-right ">
        <address>
          <strong>Transaction Reference:</strong><br>
          {{ $payment->transaction_reference }}<br>
          <strong>Payment Gateway:</strong><br>
          Paystack<br>
          <strong>Gateway Response:</strong><br>
          <br>
        </address>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-12">
        <div class="section-title">Payment Summary</div>
        <div class="table-responsive">
          <table style="width: 100%" class="table-print table-striped table-hover table-md">
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Invoice</th>
              <th>Description</th>
              <th class="text-right">Amount (₦)</th>
            </tr>
            <tr>
              <td>1</td>
              <td>{{ $payment->payment_date}}</td>
              <td>{{ $payment->invoice}}</td>
              <td>{{ $payment->payment_option}}</td>
              <td class="text-right">{{ $payment->amount }}</td>
            </tr>
            <tr>
              <td colspan="5" class="text-right"><b>Total Amount</b></td>
              <td class="text-right add-sum-border"><b></b></td>
            </tr>
          </table>
        </div>
        <div class="row mt-4">
          <div class="col-lg-8"></div>
          <div class="col-lg-4 text-right">
            <div class="invoice-detail-item">
              <hr class="mt-2 mb-2">
              <div class="invoice-detail-item">
                <div class="invoice-detail-name">Total</div>
                <div class="invoice-detail-value invoice-detail-value-lg">₦{{ $payment->amount }}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="rubber">PAYMENT RECEIVED</div>
      </div>
      <hr>
      <div class="text-md-right">
        <button onclick="javascript:window.print();" class="no-print btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
       <a href="{{ route('admission.slip',['app_no'=>$student->app_no]) }}">click here to Print Your Admission letter</a>
        
      </div>
    </div>

  </fdiv>
  
</body>
</html>
