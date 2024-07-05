<!DOCTYPE html>
<html lang="en">
@include('includes_slip.head')
<body>
    <div class="admission-logo-watermark text-center">
        <img src="{{asset('assets/img/favicon.png')}}" alt="Logo">
    </div>

    
    <div class="container">

        <!-- header section -->
        <div class="container-fluid">
            <div class="admission-header-section row">
                <div class="col-2 admission-logo">
                    <img src="{{asset('assets/img/favicon.png')}}" alt="School Logo">
                </div>
                <div class="col-10 text-center">
                    <h1 class="school-name">Ceresense ICT Institution</h1>
                    <h5 class="school-address">No 2,foyeke street,opposite tawheed junction, basin, ilorin, kwara state.</h5>
                    <h6 class="school-website">Website: <a href="">www.ceresense.com.ng</a> | Contact: <span
                            class="school-contact">+234 7063419718, +234 8036436594</span></h6>
                </div>
            </div>
        </div>

       

        <!-- date -->
        <div class="text-right mt-2">
            <h6>24th June 2024</h6>
        </div>

       
        <!-- main student information -->
        <div class="m-0">


             <!-- Student avatar Section -->
       
        <!-- end student avatar section -->




            <div class="row">
                {{ $slot }}
                {{-- <div class="col-10">
                    <div class="info-item"><strong>Firstname:</strong> {{ucfirst(strtolower($student->firstname) )}}</div>
                    <div class="info-item"><strong>Surname:</strong> {{ucfirst(strtolower( $student->surname ))}}</div>
                    <div class="info-item"><strong>Othername:</strong> {{ ucfirst(strtolower( $student->othername ))}}</div>
                    <div class="info-item"><strong>Application Number:</strong> {{ $student->app_no }}</div>
                    <div class="info-item"><strong>Method Of Payment:</strong> {{ $student->payment_method }}</div>
                    <div class="info-item"><strong>Email Address:</strong> {{ $student->email }}</div>
                    <div class="info-item"><strong>Course Applied:</strong> {{ $student->department->name }}</div>
                    <div class="info-item"><strong>Next of Kin:</strong> {{ $student->next_of_kin }}</div>
                    <div class="info-item"><strong>Next of Kin Phone Number:</strong> {{ $student->next_of_kin_phone }}</div>
                    <div class="info-item"><strong>Permanent Address:</strong> {{ $student->address }}</div>
                </div>
                <div class="col">
                    <div class="text-right student-info">
                        <img style="" width="100px" height="100px" src="{{ asset('upload/' . $student->passport) }}"
                        alt="">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    
</body>
</html>