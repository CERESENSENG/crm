<x-promo-layout>

    <x-slot:title>
        Ceresense::Register Promo Cohort Training
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
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg watchvideomodal" data-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                                <div class="modal-content home-modal p-1">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    {{-- <video id="VisaChipCardVideo" class="video-box" controls="">
                                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                                        <!--Browser does not support <video> tag -->
                                    </video> --}}
                                </div>
                            </div>
                        </div>
                        <!-- END MODAL -->
                        </div>
                    </div><!-- end col-->
                    <div class="col-lg-5">
                        <div data-aos="fade-left" data-aos-duration="1800">
                            <form method="post"   action="{{route('promo.store')}}" class="contact-form" name="myForm" id="myForm">
                                 @csrf

                                {{-- <div class="text-center">
                                    <div class="icon"   style="font-size:40px"   >
                                        <i class="mdi mdi-account-group-outline"></i>
                                    </div>
                                </div> --}}
                                  @include('promo.include.alert')
                                <div class="text-center">
                                    <h5 class="text-white"> <i class="mdi mdi-account-group-outline"></i>  Applicant Registration </h5>
                                </div>
                                <span id="error-msg"></span>
                                <div class="row rounded-3 py-3">
                                    <div class="col-lg-12">
                                        <div class="position-relative mb-3">
                                            <span class="input-group-text"><i class="mdi mdi-account-outline "></i></span>
                                            <input name="surname" id="name" type="text" class="form-control" placeholder="Enter your surname "  required  >
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="position-relative mb-3">
                                            <span class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                                            <input name="firstname" id="firstname" type="text" class="form-control" placeholder="Enter your   firstname "  required  >
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="position-relative mb-3">
                                            <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Enter your email*"   rquired  >
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="position-relative mb-3">
                                            <span class="input-group-text"><i class="mdi mdi-phone-outline"></i></span>
                                            <input name="phone" id="phone" type="text" class="form-control" placeholder="Enter your phone number ">
                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-12">
                                        <div class="position-relative mb-3">
                                            <span class="input-group-text"><i class="mdi mdi-file-document-outline"></i> </span>
                                            <input name="passport" id="passport" type="file" class="form-control" placeholder="Upload Passport ">
                                        </div>
                                    </div> --}}


                                    <div class="col-lg-12">
                                        <div class="position-relative mb-3">
                                            <span class="input-group-text"><i class="mdi mdi-book-account-outline"></i> </span>
                                        <select    name="course[]"   class="form-control js-select2"  multiple   required='' >
                                            {{-- <option  value=''> Select professional course to register </option> --}}
                                            @foreach( $courses as $crs)
                                            <option value="{{ $crs }}"
                                            >  {{ $crs }} </option>
                                           @endforeach
                                          </select>
                                        </div>

                                    </div>





                                    <div class="col-lg-12">
                                        <div class="position-relative mb-3">
                                        <span class="input-group-text align-items-start"><i class="mdi mdi-map-marker-outline"></i></span>
                                            <textarea name="address" id="comments" rows="3" class="form-control" placeholder="Enter your residential address*"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-center ">
                                            <input type="submit" id="submit" name="send" class="btn  btn-block btn-outline-white" value="Register">
                                        </div>
                                    </div>
                                </div>
                            </form>
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


$(document).ready(function() {
    $('.js-select2').select2({
        minimumSelectionLength: 3,
        maximumSelectionLength: 3,  // Limit to 3 selections
                placeholder: "Select exactly 3 professional courses"

    });
});
// const win  =  window.onload = () => {
//     // Your function here
//       $('#video-modal').modal('show');
//    //   $("#video-player")[0].autoplay = true;
//      // document.getElementById("video-player").setAttribute('autoplay', true);


//      const iframe = document.createElement('iframe');

//            // Set the necessary attributes for the iframe
//              iframe.setAttribute('width', '700');
//              iframe.setAttribute('height', '380');
//              iframe.setAttribute('src', `https://www.youtube.com/embed/OBewEVZmpcg?autoplay=1`);
//              iframe.setAttribute('frameborder', '0');
//              iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
//              iframe.setAttribute('allowfullscreen', '');

//             // Append the iframe to the video container
//             const videoContainer = document.getElementById('video-container');
//             videoContainer.innerHTML = ''; // Clear any existing content
//             videoContainer.appendChild(iframe);



// };




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


