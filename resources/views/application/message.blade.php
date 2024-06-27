
<x-pages-layout>
    <x-slot:title>
        Application :: Completed
    </x-slot:title>
    <div class="container">
        <div class="card mt-2">
            <div class="card-header bg-success text-white">Success</div>
            <div class="card-body">
                @if($student)
                <p>Hi {{ $student->surname }} {{ $student->firstname }} you have registered succesfully</p>
                <p>Your application details have been sent to your email</p>

                <a href="{{ route('application.slip') }}?app_no={{ urlencode($student->app_no) }}">
                    <button type="button" class="btn btn-success">Print application slip</button>
                </a>
                
            @else
                <p>No student found.</p>
            @endif
          
            </div>
        </div>
    </div>
</x-pages-layout>
