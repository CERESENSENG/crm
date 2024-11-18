
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






@extends('layouts.student.main.app')
@section('title','KWARASDC :: CSE Application Slip | '.app("settings")["school_name"])
@section('custom-style')
<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
<style>
    body{
        background-color:white;
    }

    .bg-img{
        background: url( {{asset('assets/img/kwsgvt.png')}} );
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

@endsection
@section('content')
<div style="margin-top:-150px" >
<div class="">
    <table class="table borderless"   style="background-color:white" >
        <tr>
            <td align="center">
                <DIV STYLE="text-align:center;"><img width="100px" height="100px"  src="{{asset('assets/img/coat_of_arm.png')}}" alt="FGN" ALIGN="CENTER" /></DIV>
                <div STYLE="text-align:center; font-weight: bold; font-size: 23pt; margin: 0; padding: 0;"> KWARA  STATE OF NIGERIA  </div>
                    <div STYLE="text-align:center; font-weight: normal;font-size: 18pt; margin: 2px 0; padding: 0;"> Civil Service Examinations</div>
                <div STYLE="text-align:center; font-weight: bold; font-size: 13pt; margin: 2px 0; padding: 0;">  APPLICATION  FORM </div>



                </td>
                </tr>
                <tr>

                   <td align="center"   >
                    <br/>
     <div  >
    <img  src="{{$student->passport}}" class="imageThumb" alt="passport" width="150px" height="150px" />
    </div>
    </td>
        </tr>
    </table>
</div>
<p  style="font-weight: bold; text-align:center;">
                <a href="javascript:window.print();" >Print</a>

</p>

         <table  class="table-print bg-img"   style="margin-left:20%"  >
            <tr>
                <td  > <h4> CANDIDATE DETAILS </h4> </td>
              </tr>
              <tr>
                <td    >
                   Candidate`s  Name:
                    </td>  <td   >
                        {{$student->surname}} {{$student->firstname}}   {{$student->othername}}
                    </td>


                </tr>

                <tr>
                <td >
                     Exam No:
                    </td>  <td  >
                        {{$student->matric_no}}
                    </td>
                </tr>
                <tr>
                    <td >
                        Cadre/Grouping:
                        </td>  <td >
                            {{$student->department->code}}
                        </td>
                    </tr>
                <tr>
                    <td >
                        Application Number:
                        </td>  <td   >
                            {{$student->app_no}}
                        </td>
                    </tr>

                <tr>
                <td >
                    Exam Session:
                    </td>  <td     >
                        {{$student->entry_session}}
                    </td>
                </tr>

                <tr>
                    <td >
                      Registration Date
                        </td>  <td   >
                            {{date( "D, jS \of F Y h:i:s A",strtotime($student->created_at))}}
                        </td>
                    </tr>

                     <tr>
                    <td >
                         Payment Reference:
                        </td>  <td      >
                            {{$payment->txn_ref}}
                        </td>
                    </tr>




                    <tr>
                       <th > <h4> REGISTERED SUBJECTS </h4></th>
                    </tr>
                    <tr>
                       <td > <h6>Paper/Subject Title</h6></td>  <td > <h6> Code</h6></td>
                    </tr>

                        @foreach( $courses  as $crs)
                         <tr>
                          <td >{{$crs->name }}</td>
                            <td   >{{$crs->code}}</td>
                         </tr>

                        @endforeach

                  </table>

  <br><br>

     <div  style="text-align:center"  class="text-info">Candidates are advised to keep their examination slip as you will be required to present them at the examination centre for official use. KINDLY NOTE THAT MOBILE PHONES ARE NOT ALLOWED IN THE EXAMINATION HALL</div>


</div>
@endsection
