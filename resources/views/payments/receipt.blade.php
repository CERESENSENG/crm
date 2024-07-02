
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admission</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <!-- Main CSS File -->
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- =======================================================
    * Template Name: Mentor
    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    * Updated: Jun 14 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <div class="receipt-watermark-logo text-center">
        <img src="{{asset('assets/img/favicon.png')}}" alt="Logo">
    </div>

    <div class="container p-3 p-md-4 p-lg-5">
        <!-- Header -->
        <!-- Header Section -->
        <div class="admission-header-section row">
            <div class="col-2 admission-logo">
                <img src="{{asset('assets/img/favicon.png')}}" alt="School Logo">
            </div>
            <div class="col-10 text-center">
                <h1 class="school-name">Ceresense ICT Institution</h1>
                <h5 class="school-address">123 Main Street, Ilorin, Nigeria</h5>
                <h6 class="school-website">Website: <a href="">www.ceresense.edu</a> | Contact: <span
                        class="school-contact">09123456789</span></h6>
            </div>
        </div>

        <div class="receipt-header mt-4">
            <h2>Receipt</h2>
        </div>



        <!-- Transaction Information -->
        <div class="transaction-info mb-3">
            <div class="row">
                <div class="col-6">
                    <p><strong>Billed to:</strong> {{ $student->firstname }} {{ $student->othername }} {{ $student->surname }}</p>

                    <p><strong>App No:</strong> {{ $student->app_no}}</p>

                    <p><strong>Cohort:</strong> {{ $student->cohort}}</p>
                    <p><strong>Gateway Response:</strong>  {{ $payment->gateway_response}}</p>
                </div>

                <div class="col-6 text-right">
                    <p><strong>Admission Year:</strong> {{ $student->admission_year }}</p>

                    <p><strong>Transaction Ref:</strong> {{ $payment->transaction_reference }}</p>

                    <p><strong>Payment Gateway:</strong> Paystack</p>

                </div>
            </div>

        </div>

        <!-- Payment Summary -->
        <div class="payment-summary mb-3">
            <p class="h5">Payment Summary</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Transaction Ref</th>
                        <th>Purpose</th>
                        <th>Description</th>
                        <th>Amount Paid (₦)</th>
                        <th>Amount Due (₦)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $payment->payment_date}}</td>
                        <td>{{ $payment->invoice}}</td>
                        <td>{{ $payment->transaction_reference}}</</td>
                        <td>{{ $payment->purpose}}</td>
                        <td>{{ $payment->schedule->description }}</td> 
                        <td> &#8358;{{number_format($payment->amount )}}</td>
                        <td>&#8358;{{number_format($payment->amount_due ) }}</td>
                        

                    </tr>
                   
                    <tr>
                        <td colspan="7" class="text-right"><strong>Total Amount</strong></td>
                        <td class="unique-border"><strong> &#8358;{{number_format($payment->amount  )}}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Signature/Stamp Section -->
        <div class="signature-section">
            <p class="total-amount">Total Amount:&#8358;{{number_format($payment->amount )}}</p>
        </div>
        <div class="text-md-right">
          <button onclick="javascript:window.print();" class="no-print btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
         <a href="{{ route('admission.slip',['app_no'=>$student->app_no]) }}">click here to Print Your Admission letter</a>
          
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
