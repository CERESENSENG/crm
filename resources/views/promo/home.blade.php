<x-promo-layout>

    <x-slot:title>
        Home::Ceresense Promo Training
    </x-slot>



    {{-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-close">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5">
                    <div class="text-center mb-5">
                        <h4 class="modal-title" id="exampleModalLongTitle">Sing Up</h4>
                        <p class="fs-14">Already have an account? <a href="javascript:void(0)">Log in here</a></p>
                    </div>
                    <div class="d-grid gap-3">
                        <a class="btn btn-outline-dark btn-lg" href="javascript:void(0)">
                        <span class="d-flex justify-content-center align-items-center">
                            <img class="avatar avatar-xs me-2" src="images/google.jpg" alt="Image Description">
                            Sign up with Google
                        </span>
                        </a>
                        <a class="btn btn-primary btn-lg" href="javascript:void(0)">Sign up with Email</a>
                        <div class="text-center">
                            <p class="mb-0 fs-13">By continuing you agree to our <a class="text-primary" href="javascript:void(0)">Terms and Conditions</a></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-block text-center px-5 pb-5">
                    <p class="footer-text mb-4">Trusted by the world's best teams</p>
                    <div class="mx-auto">
                      <div class="row justify-content-between">
                        <div class="col">
                          <img class="img-fluid" src="images/github.svg" alt="Logo">
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="images/gitlab.svg" alt="Logo">
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="images/linkedin.svg" alt="Logo">
                        </div>
                        <div class="col">
                            <img class="img-fluid" src="images/instagram.svg" alt="Logo">
                        </div>
                      </div>
                    </div>
                    <!-- End Row -->
                  </div>
            </div>
        </div>
    </div> --}}
<!-- End modal -->

<div class="overflow-hidden-x">
    <!-- Start Home -->
<section class="section home home-4" id="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="home-heading">
                    <h1 class="mb-3 text-white">Unlock Your Future with Our 3-in-1 Professional  <span class="text-warning">  Courses! </span></h1>
                </div>
                    <p class="text-white-50 fs-20">  Get 99% OFF on our exclusive training programs, a limited offer available!
                        Master in-demand skills and accelerate your career. Enroll now before this incredible deal ends!
                    </p>



                        <div class="home-btn hstack gap-2 flex-column d-sm-block">
                    <a class="btn btn-white me-1" href="javascript:void(0)"> Enrol Now  </a>
                        <a class="modal-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".watchvideomodal">
                            <span class="avatar-sm">
                                <span class="avatar-title rounded-circle btn-icon bg-white">
                                    <i class="mdi mdi-play"></i>
                                </span>
                            </span>
                        </a>
                <!-- Modal -->
                <div  id="video-modal"   class="modal fade bd-example-modal-lg watchvideomodal" data-keyboard="false" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                        <div class="modal-content home-modal p-1">
                            <div class="modal-header border-0">
                                <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <video id="VisaChipCardVideo" class="video-box" controls="">
                                <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                                <!--Browser does not support <video> tag -->
                            </video>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->
                </div>
            </div><!-- end col-->
            <div class="col-lg-5">
                <div class="mt-5 mt-lg-0">
                    <img class="img-fluid" src="{{url('promo/images/home-4.png')}}" alt="">
                    <img class="img-fluid d-none d-lg-block shape-1" src="{{url('promo/images/home-parth-1.jpg')}}" alt="">
                    <img class="img-fluid d-none d-lg-block shape-2" src="{{url('promo/images/home-parth-2.png')}}" alt="">
                    <img class="img-fluid d-none d-lg-block shape-3" src="{{url('promo/images/home-parth-3.png')}}" alt="">
                    <img class="img-fluid d-none d-lg-block frame" src="{{url('promo/images/frame.png')}}" alt="">
                </div>
            </div>

        </div><!-- end row-->
    </div><!--end container-->
    <div class="bottom-img position-absolute bottom-0 start-0">
        <img src="{{url('promo/images/bg-wave.svg')}}" alt="wave shape" class="img-fluid">
    </div>
</section>
<!-- End Home -->

<!-- Start features -->
<section class="section feature" id="features">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center mb-4">
                    <h2 class="heading">Programme Overview</h2>
                    <p class="text-muted fs-17">At Ceresense, we're committed to providing you with not only technical skills but also a comprehensive learning experience that prepares you for
                        the professional world. Here's what you need to know about your journey with us</p>
                </div>
                {{-- <h3 class="feature-heading"> What to Expect as a Ceresense Student   </h3> --}}
            </div><!-- end col-->
        </div><!-- end row-->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-7 mt-sm-4">
                <div data-aos="fade-right" data-aos-duration="1800">
                    <div class="feature-card p-3 py-sm-4 rounded d-flex">
                        <div class="flex-shrink-0">
                            <i class="mdi mdi-responsive text-primary float-start me-3 h2"></i>
                        </div>
                        <div class="flex-grow-1 ms-2">
                                <div class="content">
                                    <h5 class="title"> Program Timeline  </h5>
                                    <p class="text-muted">
                                    The full program timeline will be displayed on the notice board and available on the student forum
                                    </p>
                                    <a href="javascipt:void(0)" class="text-dark">Read More <i class="mdi mdi-chevron-right"></i></a>
                                </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-7 mt-sm-4">
                <div class="feature-card p-3 py-sm-4 rounded">
                    <i class="mdi mdi-layers-triple-outline text-primary float-start me-3 h2"></i>
                    <div class="content d-block overflow-hidden">
                        <h5 class="title">  Presentations Week </h5>
                        <p class="text-muted mt-2">
                        Participation in Presentations Week is required for every student, whether presenting or not. Attendance will contribute to your certification eligibility.

                        </p>
                        <a href="javascipt:void(0)" class="text-dark">Read More <i class="mdi mdi-chevron-right"></i></a>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-7 mt-sm-4">
                <div data-aos="fade-left" data-aos-duration="1800">
                    <div class="feature-card p-3 py-sm-4 rounded">
                        <i class="mdi mdi-clipboard-flow-outline text-primary float-start me-3 h2"></i>
                        <div class="content d-block overflow-hidden">
                            <h5 class="title">
                                Final Project Defense  </h5>
                            <p class="text-muted mt-2">
                                Completion and defense of your final project are mandatory for program clearance and certification.
                              </p>
                            <a href="javascipt:void(0)" class="text-dark">Read More <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
        <div class="row my-sm-5 py-5 align-items-center justify-content-between">
            <div class="col-lg-6">

                <div class="mt-5 mt-lg-0" data-aos="fade-down" data-aos-duration="1800">
                    <img src="{{url('promo/images/home-6.png')}}" class="img-fluid" alt="">

                </div>


                {{-- <div data-aos="fade-right" data-aos-duration="1800">
                    <div class="card bg-transparent border-0 mb-3 mb-lg-0">
                        <img src="{{url('promo/images/feature1.png')}}" class="img-fluid rounded-3" alt="">
                    </div>
                </div> --}}
            </div><!-- end col -->
            <div class="col-lg-6">

                <div data-aos="fade-right" data-aos-duration="1800">
                    <h4 class="feature-heading">  Requirements for Students   </h4>
                    {{-- <p class="text-muted"> Class Schedule   </p> --}}
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <a class="accordion-button" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div>
                                    <p class="mb-0"> Technology & Tools  </p>
                                    <p class="mb-0 fs-13 text-muted">
                                          </p>
                                </div>
                            </a>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="fs-14 text-muted mb-1">
                                    A laptop is essential for your studies. If you do not own one,
                                     Ceresense provides laptops as an alternative. However, we strongly recommend
                                     having your own for a smoother learning experience. Need advice on buying a new laptop?
                                      Our admin is here to guide you.
                                </p>
                                {{-- <a href="javascript:void(0)">
                                    Check it out <i class="mdi mdi-arrow-right"></i>
                                </a> --}}
                            </div>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <a class="accordion-button collapsed" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <div>
                                     <p class="mb-0"> Accomodation </p>
                                    <p class="mb-0 fs-13 text-muted"> </p>
                                </div>
                            </a>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                {{-- <p class="fs-14 text-muted mb-0">Lorem text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical.</p>
                              <p class="text-muted">Now that we've aligned the details, it's time to get things mapped out and organized. Now that we've aligned the details. </p> --}}

                                <ul class="feature-list">
                                    <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary"></i>
                                        <span class="text-muted">Student Bed Space: Each student is provided with a bed space. Please bring your bedsheet cover and pillow as needed.</span>
                                    </li>
                                    <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary"></i>
                                        <span class="text-muted"> Hostel Facilities: The hostel accommodation includes a shared kitchen space but does not cover feeding.
                                             Feel free to cook meals using the shared kitchen space, and enjoy a communal living experience with your roommates.</span>

                                    </li>
                                    <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary"></i>
                                        <span class="text-muted">  Hostel Rules: All residents must adhere to the hostel rules and regulations for a respectful and harmonious living environment.</span>
                                    </li>
                                </ul>




                            </div>
                        </div>
                        </div>
                        {{-- <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <a class="accordion-button collapsed" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <div>
                                    <p class="mb-0">On site tech support</p>
                                    <p class="mb-0 fs-13 text-muted">Connectivity, power, and IT issues solved in no time.</p>
                                </div>
                            </a>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="fs-14 text-muted mb-0">Lorem text is also used to demonstrate the appearance of different typefaces and layouts, and in general the content of dummy text is nonsensical.</p>
                                <a href="javascript:void(0)" class="fs-14 text-decoration-none">
                                    Check it out <i class="mdi mdi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        </div> --}}
                    </div>
                </div>
















            </div><!-- end col -->
        </div><!-- end row -->
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6">


       <div data-aos="fade-left" data-aos-duration="1800">
                    <h3 class="feature-heading mb-2">Flexible Class Schedule for Your Convenience </h3>
                    <p class="text-muted">
                        Our courses are held Monday through Friday, with both morning and afternoon sessions to fit your schedule. Each session lasts 2-3 hours, spread over six months to ensure comprehensive learning at a comfortable pace.
                    </p>
                    {{-- <ul class="feature-list">
                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary"></i>Laptop and</li>
                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary"></i>Designing marketing materials </li>
                        <li><i class="mdi mdi-checkbox-marked-circle-outline text-primary"></i>Update website content</li>
                    </ul> --}}
                    {{-- <a class="btn btn-primary" href="avascipt:void(0)">Learn more</a> --}}
                </div>


            </div><!-- end col -->
            <div class="col-lg-6">
                <div data-aos="fade-left" data-aos-duration="1800">
                    <div class="card bg-transparent border-0">
                        <img src="{{url('promo/images/feature2.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div><!-- end container -->
</section>
<!-- end Features -->

<!-- Start cta -->
{{-- <section class="section cta">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <div data-aos="fade-down" data-aos-duration="1800">
                    <h3 class="fw-bold">  Unlock Your Career with Our Discount Cohort Program!
                    </h3>
                    <p>
                        Our exclusive program gives you the opportunity to complete 3 in-demand professional courses in just 6 months for a single payment at almost 99% off! Choose from the following courses:
                    </p>
                         <ul class="feature-list">
                        <li>  Web Development</li>
                        <li>UI/UX Design </li>
                        <li>Data Analysis  </li>
                        <li> Cybersecurity </li>
                    </ul>
                    <a class="btn btn-primary" href="javascript:void(0)">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- End cta -->



<!-- Start cta -->
<section class="section cta">
    <marquee behavior="" direction="left"><p class="mb-0">
        Can’t join us in January? Stay tuned for the second half of the year! Our next cohort runs from June 12th to October 12th, with onboarding week beginning on June 12th. Hostel opens, classes start, and a new journey begins

    </p></marquee>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <div data-aos="fade-down" data-aos-duration="1800">
                    <div class="cta-heading">Unlock Your Career with Our Discounted Cohort Program!
                        {{-- <span class="mb-3">
                            <span class="counter_value" data-target="37">0</span>
                            <span>% Off</span>
                        </span>! --}}
                    </div>

                    <p>
                        Our exclusive program offers you the chance to complete 3 in-demand professional courses in just 6 months for a single payment at almost 99% off! You can choose from the following courses:
                        Web Development, UI/UX Design, Data Analysis, and Cybersecurity.
                    </p>

                        <!-- <p class="fs-18">Limited signup only. Order today before the discount period end.</p> -->
                        <a class="btn btn-primary" href="javascript:void(0)"> Enroll Now for January Cohort  </a>




                    </div>
            </div>
        </div>
    </div>
</section>
<!-- End cta -->

<!-- Start Team -->
<section class="section team" style="z-index: 1;">
    <div id="particles-js" style="z-index: -1;">
    </div>
    <!-- end particles -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="text-center mb-5">
                    <h2 class="heading">Contact Us</h2>

                    <div class="content">
                        <h5 class="title"> Phone Numbers: </h5>
                        <p class="text-muted"> +234-7063-419-718, +234-8036-436-594
                        </p>

                    </div>

                    <div class="content">
                        <h5 class="title"> Office Address: </h5>
                        <p class="text-muted"> N0 2,Foyeke street,opposite tawheed junction,basin,ilorin,kwara state
                        </p>

                    </div>

                </div>




            </div><!-- end col-->
        </div><!-- end row -->

    </div><!-- end cotainer-->
</section>
<!-- End Team -->

<!-- Start contact -->
{{-- <section class="section contact" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-5">
                    <h2 class="heading">Contact Us</h2>
                    <p class="text-muted mt-2 fs-17">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
        <div class="row align-items-center gy-3">
            <div class="col-lg-6">
                <div data-aos="fade-right" data-aos-duration="1800">
                    <div class="card">
                        <div class="card-body">
                            <div class="map">  <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6030.418742494061!2d-111.34563870463673!3d26.01036670629853!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1471908546569"
                                width="100%" height="325" style="border: 0" allowfullscreen></iframe>  </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-6">
                <div data-aos="fade-left" data-aos-duration="1800">
                    <form method="post" onsubmit="return validateForm()" class="contact-form" name="myForm" id="myForm">
                        <span id="error-msg"></span>
                        <div class="row rounded-3 py-3">
                            <div class="col-lg-12">
                                <div class="position-relative mb-3">
                                    <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="Enter your name*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative mb-3">
                                    <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                    <input name="email" id="email" type="email" class="form-control" placeholder="Enter your email*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative mb-3">
                                    <span class="input-group-text"><i class="mdi mdi-file-document-outline"></i></span>
                                    <input name="subject" id="subject" type="text" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative mb-3">
                                <span class="input-group-text align-items-start"><i class="mdi mdi-comment-text-outline"></i></span>
                                    <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Enter your message*"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <input type="submit" id="submit" name="send" class="btn btn-primary" value="Send Message">
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end form-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section> --}}
<!-- End contect -->

<!-- END FOOTER-ALT -->
</div>


    <x-slot:customJs >

<script>

const win  =  window.onload = () => {
    // Your function here
      $('#video-modal').modal('show');
};




        // JavaScript to open the modal on page load
       // document.addEventListener('DOMContentLoaded', function() {
            // Get the modal
            // var modal = document.getElementById('video-modal');
            // // Get the close button
            // var closeBtn = modal.querySelector('.close');

            // // Show the modal by setting display to 'block'
            // modal.style.display = 'block';

            // Close the modal when the user clicks on <span> (x)
            // closeBtn.onclick = function() {
            //     modal.style.display = 'none';
            // }

            // Close the modal if the user clicks anywhere outside of it
            // window.onclick = function(event) {
            //     if (event.target === modal) {
            //         modal.style.display = 'none';
            //     }
            // }
      //  });




</script>



    </x-slot>

</x-promo-layout>


