
 <x-slip>
<x-slot:title>
    Certificate :: Page
</x-slot:title>

    <div class="col-10">
        <div class="info-item"><strong>Certificate No:</strong> {{ ucfirst(strtoupper( $student->certificate_no ))}}</div>
        <div class="info-item"><strong>Firstname:</strong> {{ucfirst(strtolower($student->firstname) )}}</div>
        <div class="info-item"><strong>Surname:</strong> {{ucfirst(strtolower( $student->surname ))}}</div>
        <div class="info-item"><strong>Othername:</strong> {{ ucfirst(strtolower( $student->othername ))}}</div>
        <div class="info-item"><strong>Matric Number:</strong> {{ $student->app_no }}</div>
        <div class="info-item"><strong>Course:</strong> {{ $student->department->name }}</div>
    </div>
    <div class="col-2">
        <div class="text-right student-info">
            <img style="" width="100px" height="100px" src="{{ asset('upload/' . $student->passport) }}"
            alt="">
        </div>
    </div>



 </x-slip>
