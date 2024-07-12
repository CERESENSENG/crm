<!DOCTYPE html>
<html lang="en">
@include('include_letter.head')
<body>

    <div class="admission-logo-watermark text-center">
        <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo">
    </div>

    <div class="container p-3 p-md-4 p-lg-5 ">
        <!-- Header Section -->
        <div class="admission-header-section row">
            <div class="col-2 admission-logo">
                <img src="{{ asset('assets/img/favicon.png') }}" alt="School Logo">
            </div>
            <div class="col-10 text-center">
                <h1 class="school-name">Ceresense ICT Institution</h1>
                <h5 class="school-address">N0 2,Foyeke street,opposite tawheed junction,basin,ilorin,kwara state
                </h5>
                <h6 class="school-website">Website: <a href="">www.ceresense.com.ng</a> | Contact: <span
                        class="school-contact">+234 7063419718, +234 8036436594</span></h6>
            </div>
        </div>
       
        <!-- Main Letter Section -->
        <div class="mt-2">
            {{ $slot}}

            </div>
        </div>

    </div>
    @include('include_letter.scripts')
    
</body>
</html>