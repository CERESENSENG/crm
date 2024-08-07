<x-layout>
  <x-slot:title>
    Edit page 2
  </x-slot:title>
  <div class="container">
    <div class="card mt-2 mb-2">
      @if (session('message'))
      <div class="alert alert-success">
        {{ session('message') }}

      </div>
        
        
      @endif
        <div class="card-header bg-secondary text-white">STEP 2/2 - OTHER INFO   </div>
        <div class="card-body">
            <form action="{{ route('edit.stage-2.store', ['id' => $student->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="next_of_kin_phone">Next of kin phone number</label>
                    <input name="next_of_kin_phone" type="number" class="form-control"
                        value="{{  $student->next_of_kin_phone }}">
                    <span class="text-danger">
                        @error('next_of_kin_phone')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="address">Permanent address</label>
                    <input name="address" type="text" class="form-control" value="{{$student->address }}">
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>  
                {{-- <div class="form-group">
                    <label for="department_id">Department</label>
                    <select id="department_id" name="department_id" class="form-control">
                        <option value=" ">Select a dept</option>
                        @foreach ($depts as $dept)
                                <option value="{{ $dept->id }}"
                                    {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        @error('department_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div> --}}
               <div class="form-group mt-2">
                        <label class="mb-2" for="class_method">Preferred Class Method</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="class_method" id="class_method_online"
                                value="online" {{ old('class_method',$student->class_method) == 'online' ? 'checked' : '' }}>
                            <label class="form-check-label" for="class_method_online">Online</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="class_method"
                                id="class_method_physical" value="physical"
                                {{ old('class_method',$student->class_method) == 'physical' ? 'checked' : '' }}>
                            <label class="form-check-label" for="class_method_physical">Physical</label>
                        </div>
                        <span class="text-danger">
                            @error('class_method')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="mb-2 mt-2" for="skill_monetization">Skill Monetization</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="skill_monetization"
                                id="skill_monetization_yes" value="yes"
                                {{ old('skill_monetization',$student->skill_monetization) == 'yes' ? 'checked' : '' }}>
                            <label class="form-check-label" for="skill_monetization_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="skill_monetization"
                                id="skill_monetization_no" value="no"
                                {{ old('skill_monetization',$student->skill_monetization) == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" for="skill_monetization_no">No</label>
                        </div>
                        <span class="text-danger">
                            @error('skill_monetization')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <label class="mb-2 mt-2" for="payment_method">Method Of Payment</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method"
                                id="payment_method_one_time" value="one-time"
                                {{ old('payment_method',$student->payment_method) == 'one-time' ? 'checked' : '' }}>
                            <label class="form-check-label" for="payment_method_one_time">One Time</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="payment_method"
                                id="payment_method_installments" value="installments"
                                {{ old('payment_method',$student->payment_method) == 'installments' ? 'checked' : '' }}>
                            <label class="form-check-label" for="payment_method_installments">Installments</label>
                        </div>
                        <span class="text-danger">
                            @error('payment_method')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="mb-2 mt-2" for="hostel">Hostel Accommodation</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="hostel" id="hostel_yes"
                                value="yes" {{ old('hostel',$student->hostel) == 'yes' ? 'checked' : '' }}>
                            <label class="form-check-label" for="hostel_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="hostel" id="hostel_no"
                                value="no" {{ old('hostel',$student->hostel) == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" for="hostel_no">No</label>
                        </div>
                        <span class="text-danger">
                            @error('hostel')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="mb-2 mt-2" for="wifi">School WiFi</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wifi" id="wifi_yes"
                                value="yes" {{ old('wifi',$student->wifi) == 'yes' ? 'checked' : '' }}>
                            <label class="form-check-label" for="wifi_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="wifi" id="wifi_no"
                                value="no" {{ old('wifi',$student->wifi) == 'no' ? 'checked' : '' }}>
                            <label class="form-check-label" for="wifi_no">No</label>
                        </div>
                        <span class="text-danger">
                            @error('wifi')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="passport">Upload Passport</label>
                        <input name="passport" type="file" class="form-control">
                        <span class="text-danger">
                            @error('passport')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="terms" class="d-block">
                            <input type="checkbox" id="terms" name="terms"> You  agree with our
                            <a href="{{ route('registration.steps') }}">Terms and Conditions</a>
                        </label>
                        <span class="text-danger">
                            @error('terms')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
        </div>
    </div>
</div>



</x-layout>