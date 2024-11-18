<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> {{$title ??  'Ceresense Training Institute'}}  </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="ceresense Training Institute - ICT courses" />
        <meta name="keywords" content="ceresense, IT Training center in ilorin, ICT professional course in ilorin" />
        <meta content="ceresense" name="author" />


        <link rel="stylesheet" href="https://portal.kwarasdc.com.ng/assets/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://portal.kwarasdc.com.ng/assets/modules/fontawesome/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}" >

        <link rel="stylesheet" href="https://portal.kwarasdc.com.ng/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
        <!-- CSS Libraries -->
        <link rel="stylesheet" href="https://portal.kwarasdc.com.ng/assets/modules/bootstrap-select/v1.13/bootstrap-select.css"  media="print">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <link rel="stylesheet"  href="https://portal.kwarasdc.com.ng/assets/modules/datatables/datatables.min.css">
        <link rel="stylesheet" href="https://portal.kwarasdc.com.ng/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">


        <link rel="stylesheet" href="https://portal.kwarasdc.com.ng/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

        <!-- Template CSS -->
        <link rel="stylesheet"   href="https://portal.kwarasdc.com.ng/assets/css/style.css">
        <link rel="stylesheet"   href="https://portal.kwarasdc.com.ng/assets/css/components.css">
      <!-- Start GA -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

      <link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>


      <style>
        body{
            background-color:white;
        }

        .bg-img{
            background: url( {{asset('assets/img/favicon.png')}} );
            overflow: hidden;
            background-repeat : no-repeat;
            background-position: center;
            -webkit-background-size: 200px 200px;
                -moz-background-size: 200px 200px;
                -o-background-size: 200px 200px;
            background-size: 200px 200px;
            background_color:white;
        }
          table{
              background-color:white;

      margin-left: auto;
      margin-right: auto;

          }



        .table-print {
          border-collapse: collapse;
          border-spacing: 0;

          width: 70%;
          text-align: left;
          border: 0px solid #ddd;
        }

        .table-print th, .table-print td {
          text-align:left;
          padding: 4px;
        }

        {{-- .table-print tr:nth-child(even){background-color: transparent} --}}





    @media print {
    .no-print{
           display:none !important;
    }
    }


    </style>


    </head>



    <body class="layout-3" >
        <div id="app">
          <div class="main-wrapper container">
              {{-- <nav class="navbar navbar-expand-lg bg-primary">
                  <a  href="/" class="navbar-brand"  >
                      <img  src="{{asset('assets/img/favicon.png')}}"  alt='Logo'></a>

                </nav> --}}

            <!-- Main Content -->
            <div class="main-content">



        <div   style="width:100%;margin:auto;">
            <table style="margin-left:auto;margin-right:auto;border:none"  >
                <td style="padding-left:25px;padding-right:20px">
                    <DIV STYLE=""><img width="100px" height="100px"  src="{{asset('assets/img/favicon.png')}}" alt="School logo" ALIGN="CENTER" /></DIV>
                  </td>
                <td  style="text-align:center">
                    <DIV STYLE="text-align:center; font-family:Tahoma, 'Trebuchet MS', sans-serif; color:rgb(21, 128, 222);font-weight: bold; font-size: 20pt; margin: 0; padding: 0;"> CERESENSE TRAINING INSTITUTE</div>
                        <DIV STYLE="text-align:center; font-size: 12pt;font-weight:400; margin: auto; padding: auto;  color:rgb(247, 12, 59);padding:2px;"> <small><b> 2,foyeke str., opp. tawheed junction, basin, ilorin, kwara state.</b></small></div>
                    <DIV STYLE="text-align:center; font-weight: bold; color:rgb(21, 128, 222); font-size: 15pt; margin: 0; padding: 0;"> Contact No: +234 7063419718, +234 8036436594</div>
                        <DIV STYLE="text-align:center; font-weight: bold; font-size: 10pt; margin: 2px 0; padding: 0;">  Website: www.ceresense.com.ng </div>
                        <br>

                        {{-- <div>
                            <hr style="border:solid;border-bottom-style: solid;color:rgb(21, 128, 222);">
                            <hr style="color:black;border:solid">
                        </div> --}}

                        </td>

            </table>

<div  style="width:100%;border-bottom: 5px solid #081fc1;  position: absolute;"   > </div>
<div style="width:100%;margin-top: 5px;height: 5px;border-bottom: 2px solid #1691f1; position: absolute;"  ></div>
<br>
        </div>


        {{ $slot }}


            </div>
            {{-- @include('layouts.student.main.foot') --}}


          </div>
        </div>
          <!-- jsUrl -->

          {{-- <script src="https://portal.kwarasdc.com.ng/assets/modules/jquery.min.js"></script>
          <script src="https://portal.kwarasdc.com.ng/assets/modules/popper.js"></script>
          <script src="https://portal.kwarasdc.com.ng/assets/modules/tooltip.js"></script> --}}
          <script src="https://portal.kwarasdc.com.ng/assets/modules/bootstrap/js/bootstrap.min.js"></script>
          <script src="https://portal.kwarasdc.com.ng/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
          <script src="https://portal.kwarasdc.com.ng/assets/modules/moment.min.js"></script>
          <script src="https://portal.kwarasdc.com.ng/assets/js/stisla.js"></script>
          <script src="https://portal.kwarasdc.com.ng/assets/modules/axios/axios.min.js"></script>
          {{-- <script src="https://portal.kwarasdc.com.ng/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script> --}}
         <!-- JS Libraies -->
         {{-- <script src="https://portal.kwarasdc.com.ng/assets/modules/datatables/datatables.min.js"></script>
         <script src="https://portal.kwarasdc.com.ng/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
         <script src="https://portal.kwarasdc.com.ng/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
         <script src="https://portal.kwarasdc.com.ng/assets/modules/jquery-ui/jquery-ui.min.js"></script>
         <script src="https://portal.kwarasdc.com.ng/assets/js/page/modules-datatables.js"></script>

         <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

          <!-- JS Libraies -->

          <!-- Page Specific JS File -->

          <!-- Template JS File -->
          <script src="https://portal.kwarasdc.com.ng/assets/js/scripts.js"></script>
          <script src="https://portal.kwarasdc.com.ng/assets/js/custom.js"></script>



      </body>
      </html>


