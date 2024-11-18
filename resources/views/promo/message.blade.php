<x-promo-layout>

    <x-slot:title>
        Message :: Ceresense Promo Cohort Training
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
                                    <h5 class="text-white"> <i class="mdi mdi-account-group-outline"></i> Registration  Message  </h5>
                                </div>
                                <span id="error-msg"></span>
                                <div class="row rounded-3 py-3">
                                    <div class="col-lg-12">
                                        <div class="text-white position-relative mb-3">

                                           <h3> Dear  {{{$app->firstname}}},</h3>

                                        <p> Thank you for your interest in the 3-in-1 IT Skills Programme at Ceresense! We are pleased to inform you that we have received your application.
                                            Your application number is  <b>{{$app->app_no}}</b> </p>

                                      <p> To secure your spot and take advantage of the exclusive cohort discount, we encourage you to complete the payment immediately, as this is a limited-time offer.
                                        The cohort discount is only available for a short period, and slots are filling up fast. </p>

                                            <p>To proceed with your payment, simply click the button below: </p>


                                            <div class="text-center ">
                                                <a  id="submit"    href="{{route('promo.cart',$app->app_no)}}"   class="btn btn-info  btn-block btn-outline-white"  > Proceed to Payment  </a>
                                            </div>


                                            {{-- <p> We highly recommend finalizing your payment soon to secure your discounted rate and ensure your participation in the programme.
                                               If you have any questions or need assistance, please do not hesitate to contact us.

                                         We look forward to welcoming you to the 3-in-1 IT Skills Programme at Ceresense!
                                            </p> --}}


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


