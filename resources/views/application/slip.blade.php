
<x-slip>
    <x-slot:title>
        Application :: Slip
    </x-slot:title>

    <div class="col-10">
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
    <div class="col-2">
        <div class="text-right student-info">
            <img style="" width="100px" height="100px" src="{{ asset('upload/' . $student->passport) }}"
            alt="">
        </div>
    </div>



</x-slip>

