<x-print-layout>

    <x-slot:title>
      Application Slip :: Ceresense Promo Cohort Training
    </x-slot>



    <div style="margin-top:-10px" >
        <div class="">
            <table class="table borderless"   style="background-color:white" >
                 <tr>
                    <td align="center">
                        {{-- <DIV STYLE="text-align:center;"><img width="100px" height="100px"  src="{{asset('assets/img/coat_of_arm.png')}}" alt="FGN" ALIGN="CENTER" /></DIV>
                        <div STYLE="text-align:center; font-weight: bold; font-size: 23pt; margin: 0; padding: 0;"> KWARA  STATE OF NIGERIA  </div>
                            <div STYLE="text-align:center; font-weight: normal;font-size: 18pt; margin: 2px 0; padding: 0;"> Civil Service Examinations</div> --}}
                        <div STYLE="text-align:center; font-weight: bold; font-size: 13pt; margin: 2px 0; padding: 0;">  APPLICATION  FORM </div>



                        </td>
                        </tr>
                        <tr>

                           <td align="center"   >
                            <br/>
             {{-- <div  >
            <img  src="https://ui-avatars.com/api/?name={{$student->surname}}+{{$student->firstname}}" class="imageThumb" alt="passport" width="150px" height="150px" />
            </div> --}}
            </td>
                </tr>
            </table>
        </div>
        <p  style="font-weight: bold; text-align:center;">
                        <a href="javascript:window.print();" >Print</a>

        </p>

                 <table  class="table-print bg-img"   style="margin-left:20%"  >
                    <tr>
                        <td  > <h4> APPLICANT DETAILS </h4> </td>
                      </tr>
                      <tr>
                        <td    >
                           Applicant`s  Name:
                            </td>  <td   >
                                {{$student->surname}} {{$student->firstname}}
                            </td>


                        </tr>

                        <tr>
                        <td >
                             Application No:
                            </td>  <td  >
                                {{$student->app_no}}
                            </td>
                        </tr>
                        <tr>
                            <td >
                                Programme Grouping:
                                </td>  <td >
                                    {{$student->admission_year}} Cohort {{$student->cohort}}
                                </td>
                            </tr>

                            <td >
                                Programme:
                                </td>  <td >
                                    {{$student->promo_course}}
                                </td>
                            </tr>

                        {{-- <tr>
                            <td >
                                Application No:
                                </td>  <td   >
                                    {{$student->app_no}}
                                </td>
                            </tr> --}}

                        <tr>
                        <td >
                            Email Address:
                            </td>  <td     >
                                {{$student->email}}
                            </td>
                        </tr>


                        <tr>
                            <td >
                                Phone No:
                                </td>  <td     >
                                    {{$student->phone}}
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
                               <th > <h4> PAYMENT DETAILS </h4></th>
                            </tr>

                            <tr>
                                <td >
                                     Trx Ref:
                                    </td>  <td  >
                                        {{$pay->transaction_reference}}
                                    </td>
                                </tr>


                            <tr>
                                <td >
                                     Invoice No:
                                    </td>  <td  >
                                        {{$pay->invoice}}
                                    </td>
                                </tr>



                            <tr>
                                <td >
                                     Payment Ref:
                                    </td>  <td  >
                                        {{$pay->payment_reference}}
                                    </td>
                                </tr>


                            <tr>
                                <td >
                                    Amount:
                                    </td>  <td  >
                                        &#8358; {{  number_format($pay->amount,2) }}
                                    </td>
                                </tr>



                            <tr>
                                <td >
                                    Payment Gateway:
                                    </td>  <td  >
                                        {{$pay->gateway}}
                                    </td>
                                </tr>





                                <tr>
                                    <td >
                                        Gateway response:
                                        </td>  <td  >
                                            {{$pay->gateway_response}}
                                        </td>
                                    </tr>



                            <tr>
                                <td >
                                     Payment Date:
                                    </td>  <td  >

                                        {{date( "D, jS \of F Y h:i:s A",strtotime($pay->payment_date))}}
                                    </td>
                                </tr>

                            {{-- <tr>
                               <td > <h6>Paper/Subject Title</h6></td>  <td > <h6> Code</h6></td>
                            </tr> --}}

                                {{-- @foreach( $courses  as $crs)
                                 <tr>
                                  <td >{{$crs->name }}</td>
                                    <td   >{{$crs->code}}</td>
                                 </tr>

                                @endforeach --}}

                          </table>

          <br><br>

             <div  style="text-align:center"  class="text-info"> Applicants are advised to keep their application slip as you will be required to present them for official use.
                 </div>


        </div>








{{--




    <p  style="font-weight: bold; text-align:center;">
        (APPLICATION SLIP)
        </p>


        <table width="100%"  style="background-color:white" align="center"   >
            <tr>

            <div align="justify" style="margin:5px 0px 0px 0px;"     >
            <p align="center"><strong><U>  APPLICATION SLIP  FOR {{$student->admission_year}} {{ $student->cohort ==  1 ?  'JANUARY': 'JUNE' }}  COHORT  3-IN-1  PROGRAMME </U> </strong></p>

            <table   width="100%" align="center"  class="bg-img" >
                <tr>
                     <table  class="table-print"  >
                        <tr>
                            <td colspan="7"> <strong> BIO-DATA DETAILS </strong> </td>
                          </tr>
                          <tr>
                            <th >
                               Name:
                                </th>  <td colspan=2>
                                    {{$student->surname}} {{$student->firstname}}
                                </td>
                                <td  rowspan=6>

                                    <img  width="120px" height="120px" src="https://ui-avatars.com/api/?name={{$student->surname}}+{{$student->firstname}}" alt="Student Image"  />
                                </td>

                            </tr>

                            <tr>
                            <th >
                                 Email Address:
                                </th>  <td colspan=2>
                                    {{$student->email}}
                                </td>
                            </tr>
                            <tr>
                                <th >
                                    Phone:
                                    </th>  <td colspan=2>
                                        {{$student->phone}}
                                    </td>
                                </tr>
                            <tr>
                                <th >
                                    Application Number:
                                    </th>  <td colspan=2>
                                        {{$student->app_no}}
                                    </td>
                                </tr>

                            <tr>
                            <th >
                                Course:
                                </th>  <td colspan=2>
                                    {{$student->promo_course}}
                                </td>
                            </tr>
                            <tr>
                                <th >
                                     Duration:
                                    </th>  <td colspan=2>
                                       6 Months
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="7"> <strong> PAYMENT DETAILS </strong> </td>
                                  </tr>

                                  <tr>
                                    <th >
                                        Payment Date:
                                        </th>
                                         <td colspan=2>
                                            {{$pay->payment_date}}
                                        </td>
                                  </tr>

                                  <tr>
                                    <th >
                                        Transaction Reference:
                                        </th>
                                         <td colspan=2>
                                            {{$pay->txn_ref}}
                                        </td>
                                  </tr>

                                  <tr>
                                    <th >
                                       Amount:
                                        </th>
                                         <td colspan=2>
                                            {{$pay->amount}}
                                        </td>
                                  </tr>

                                  <tr>
                                    <th >
                                        Payment Reference:
                                        </th>
                                         <td colspan=2>
                                            {{$pay->payment_ref}}
                                        </td>
                                  </tr>

                                  <tr>
                                    <th >
                                        Payment Gateway:
                                        </th>
                                         <td colspan=2>
                                            {{$pay->gateway}}
                                        </td>
                                  </tr>

                                  <tr>
                                    <th >
                                         Gateway Response:
                                        </th>
                                         <td colspan=2>
                                            {{$pay->gateway_response}}
                                        </td>
                                  </tr>


                </table> --}}







</x-print-layout>

