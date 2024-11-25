<x-promo-layout>

    <x-slot:title>
        Payment Cart :: Ceresense Promo Cohort Training
    </x-slot>

{{--
    <div class="overflow-hidden-x"> --}}
        <!-- Start Home -->
        <section class="section home home-5" id="home">
            <!-- <div class="bg-overlay"></div> -->
            <div class="container">
                <div class="row gap-lg-0 gap-5 align-items-center">
                    <div class="col-lg-7">
                        <div class="home-heading">
                            <h1 class="mb-3 text-white">Unlock Your Future with Our 3-in-1 Professional  <span class="text-warning">  Courses! </span></h1>
                        </div>
                            <p class="text-white-50 fs-20">  Get 99% OFF on our exclusive training programs, a limited offer available!
                                Master in-demand skills and accelerate your career. Enroll now before this incredible deal ends!
                            </p>

                            <p class="text-white-50 fs-20">Explore and learn more about everything from machine learning and global payments to scaling your team.</p>
                        <div class="home-btn hstack gap-2 flex-column d-sm-block">
                            <a class="btn btn-white me-1" href="{{route('promo.register')}}">Enrol Now</a>
                            {{-- <a class="modal-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".watchvideomodal">
                                <span class="avatar-sm">
                                    <span class="avatar-title rounded-circle btn-icon bg-white">
                                        <i class="mdi mdi-play text-primary"></i>
                                    </span>
                                </span>
                            </a> --}}

                        </div>
                    </div><!-- end col-->
                    <div class="col-lg-5">
                        <div data-aos="fade-left" data-aos-duration="1800">
                            {{-- <form method="post"   action="" class="contact-form" name="myForm" id="myForm"> --}}
                                {{-- <div class="text-center">
                                    <div class="icon"   style="font-size:40px"   >
                                        <i class="mdi mdi-account-group-outline"></i>
                                    </div>
                                </div> --}}
                                  @include('promo.include.alert')
                                <div class="text-center">
                                    <h5 class="text-white"> <i class="mdi mdi-credit-card-outline"></i> Registration Invoice  </h5>
                                </div>
                                <span id="error-msg"></span>
                                <div class="row rounded-3 py-3">
                                    <div class="col-lg-12">
                                        <div class="text-white position-relative mb-3">


                                            <table  class="text-white table borderless" width="100%" >
                                                <tr>
                                                    <th>Name</th> <td>{{ $app->surname }} {{$app->firstname }} </td>
                                                </tr>

                                                <tr>
                                                 <th>Email address</th> <td>{{  ($app->email?? 'admin@ceresense.com.ng' ) }}  </td>
                                             </tr>

                                             <tr>
                                                <th>Trnx Ref. </th> <td>{{ $txn_ref }}  </td>
                                            </tr>
                                            <tr>
                                                <th>Invoice # </th> <td>{{ $invoice }}  </td>
                                            </tr>

                                                <tr>
                                                  <table class="text-white table borderless"   width="100%" >

                                                         <th>#</th><th>Payment Name</th>     <th>Amount</th>

                                                             <tr>
                                                                  <td>1.</td>
                                                                   <td> Payment for Cohort Program({{ (json_decode($app->info))->course  }})</td>
                                                                   <td> &#8358; {{  number_format($amount,2)}}</td>
                                                                 </tr>

                                                            <tr>
                                                                <td>2.</td><td>Convenience Fee</td>
                                                                 <td  style="  border-bottom: 2pt double #808080"> &#8358;{{ number_format($charges,2) }}</td>
                                                            </tr>
                                                              <tr >
                                                                  <td></td><td> Total Payable Amount</td><td style="  border-bottom: 2pt double #808080 " > <b> &#8358;{{ number_format(($total),2)  }}</b> </td>
                                                              </tr>
                                                  </table>
                                                </tr>


                                               <tr> </tr>

                                              </table>
                                        <form  method="POST" action="{{route('promo.checkout')}}" >
                                             @csrf

                                             {{-- <input type="hidden"  name="name"   value="{{ $student->surname.' '.$student->firstname }}" > --}}
                                             <input type="hidden"  name="surname"   value="{{ $app->surname }}" >
                                             <input type="hidden"  name="firstname"   value="{{ $app->firstname }}" >
                                             <input type="hidden"  name="txn_ref"   value="{{ $txn_ref }}" >
                                             <input type="hidden"  name="invoice"   value="{{ $invoice }}" >
                                             <input type="hidden"  name="email"   value="{{ ($app->email?? 'admin@ceresense.com.ng' ) }}" >
                                             <input type="hidden"  name="phone"   value="{{ ($app->phone??'09012345678') }}" >
                                             <input type="hidden"  name="amount"   value="{{ $amount }}" >
                                             <input type="hidden"  name="total"   value="{{ $total }}" >
                                             {{-- <input type="hidden"  name="callbackUrl"   value="{{ $callbackUrl }}" > --}}
                                             <input type="hidden"  name="gateway"   value="paystack" >
                                             {{-- <input type="hidden"  name="charges"   value="{{ $charges }}" > --}}
                                             {{-- <input type="hidden"  name="app_id"   value="{{ $app->id }}"  > --}}
                                             <input type="hidden"  name="app_no"   value="{{ $app->app_no }}"  >
                                             <input type="hidden"  name="session"   value="{{ $session  }}"  >
                                             <input type="hidden"  name="cohort"   value="{{ $cohort }}"  >
                                             <input type="hidden"  name="schedule_id"   value="{{ $pay_schedule_id }}"  >


                                             {{-- <div class="form-group">
                                                 <button type="submit" class="btn btn-primary btn-lg btn-block" >
                                                    Checkout
                                                 </button>
                                               </div> --}}

                                               <div class="col-lg-12">
                                                <div class="text-center ">
                                                    <button id="submit" type="submit"   class="btn  btn-block btn-outline-white"  > Checkout  </button>
                                                </div>
                                            </div>

                                         </form>








                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-12">
                                        <div class="text-center ">
                                            <a  id="submit"    href="{{route('promo.cart',$app->app_no)}}"   class="btn  btn-block btn-outline-white"  > Proceed to Payment  </a>
                                        </div>
                                    </div> --}}
                                </div>
                            {{-- </form> --}}
                            <!--end form-->
                        </div>
                    </div><!--end col-->
                </div><!-- end row-->
            </div><!--end container-->
            <div class="container">
                <div class="row">
                    <div class="home-shape">
                        <img src="images/sh01.png" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div><!--end row-->
            </div>
        </section>
        <!-- End Home -->




    <x-slot:customJs >

<script>


</script>

    </x-slot>

</x-promo-layout>


