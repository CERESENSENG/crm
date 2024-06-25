
<x-layout>
    <x-slot:title>
        Confirm Page
    </x-slot>
    <form method="POST" action="{{ route('student.storecsv') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        <table class="table">
            <tr>
                <th>#</th>
                <th>Surname</th>
                <th>Firstname</th>
                <th>Othername</th>
                <th>Matric No</th>
                <th>Department</th>
                <th>Cohort</th>
                <th>Admission Year</th>
                <th>Comment(s)</th>
            </tr>
            @foreach ($confirms as $index => $confirm)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $confirm->surname }}</td>
                    <td>{{ $confirm->firstname }}</td>
                    <td>{{ $confirm->othername }}</td>
                    <td>{!! $confirm->error_in_matric ? '<span class="text-danger">' . $confirm->appNo . '</span>' : $confirm->matricNo !!}</td>
                    <td>{!! $confirm->deptName ?? '<span class="text-danger">***</span>' !!}</td>
                    <td>{{ $confirm->cohort }}</td>
                    <td>{{ $confirm->admission_year }}</td>
                    <td>{!! $confirm->error ? '<span class="text-danger">' . $confirm->comment . '</span>' : '<span class="text-success">' . $confirm->comment . '</span>' !!}</td>
                </tr>
                <!-- Hidden inputs -->
                <input type="hidden" name="data[{{ $index }}][firstname]" value="{{ $confirm->firstname }}">
                <input type="hidden" name="data[{{ $index }}][surname]" value="{{ $confirm->surname }}">
                <input type="hidden" name="data[{{ $index }}][othername]" value="{{ $confirm->othername }}">
                <input type="hidden" name="data[{{ $index }}][appNo]" value="{{ $confirm->appNo }}">
                <input type="hidden" name="data[{{ $index }}][matricNo]" value="{{ $confirm->matricNo }}">
                <input type="hidden" name="data[{{ $index }}][admission_year]" value="{{ $confirm->admission_year }}">
                <input type="hidden" name="data[{{ $index }}][cohort]" value="{{ $confirm->cohort }}">
                <input type="hidden" name="data[{{ $index }}][status]" value="{{ $confirm->status }}">
                <input type="hidden" name="data[{{ $index }}][dept_id]" value="{{ $confirm->deptId ?? '' }}">
                <input type="hidden" name="data[{{ $index }}][classMethod]" value="{{ $confirm->classMethod }}">
                <input type="hidden" name="data[{{ $index }}][next_of_kin]" value="{{ $confirm->next_of_kin }}">
                <input type="hidden" name="data[{{ $index }}][next_of_kin_phone]" value="{{ $confirm->next_of_kin_phone }}">
                <input type="hidden" name="data[{{ $index }}][email]" value="{{ $confirm->email }}">
                <input type="hidden" name="data[{{ $index }}][phone]" value="{{ $confirm->phone }}">
                <input type="hidden" name="data[{{ $index }}][sponsors]" value="{{ $confirm->sponsors }}">
                <input type="hidden" name="data[{{ $index }}][address]" value="{{ $confirm->address }}">
                <input type="hidden" name="data[{{ $index }}][terms]" value="{{ $confirm->terms }}">
                <input type="hidden" name="data[{{ $index }}][sponsorsPhone]" value="{{ $confirm->sponsorsPhone }}">
                <input type="hidden" name="data[{{ $index }}][wifi]" value="{{ $confirm->wifi }}">
                <input type="hidden" name="data[{{ $index }}][hostel]" value="{{ $confirm->hostel }}">
                <input type="hidden" name="data[{{ $index }}][skillMonetization]" value="{{ $confirm->skillMonetization }}">
                <input type="hidden" name="data[{{ $index }}][paymentMethod]" value="{{ $confirm->paymentMethod }}">
            @endforeach
        </table>
        <div style="float:right">
            @if (!$CSV_ERR)
                <button type="submit" class="btn btn-success btn-large">Submit</button>
            @endif
        </div>
    </form>
</x-layout> 

