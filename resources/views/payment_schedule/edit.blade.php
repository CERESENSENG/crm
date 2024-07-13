<form action="{{ route('edit.schedule', ['id' => $payment->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="bootstrap-modal">
        <div class="modal fade" id="basicModalSchedule{{ $payment->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Cohort</label>
                            <select style="width:95%" required id="cohort" name="cohort" class="form-control">
                                <option  id="cohort" value=''>Choose cohort</option>
                                @foreach ($cohorts as $cohort)
                                    <option value=" {{ $cohort }}"{{ old('cohort',$payment->cohort) == $cohort ? 'selected' : '' }}>{{ $cohort }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('cohort')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        {{-- <div class="form-group">
                            <label>Department ID</label>
                            <select style="width:95%" required id="department-id" name="department_id" class="form-control">
                                <option id="department_id" value=''>Choose Department Id</option>
                                @foreach ($depts as $dept)
                                    <option value="{{ $dept }}"{{ old('dept',$payment->department_id) == $dept ? 'selected' : ' ' }}>{{ $dept }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('cohort')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div> --}}
                        <div class="form-group">
                            <label>Year</label>
                            <select style="width:95%" required id="year" name="year" class="form-control">
                                <option id="year" value=''>Select A Year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year['name'] }}"{{old('year',$payment->year) == $year['name'] ? 'selected' : ''  }}>{{ $year['name'] }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('year')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                        <div class="form-group">
                            <label for="duration">Amount</label>
                            <input style="width:95%" required name="amount" type="text" class="form-control"
                                value="{{ $payment->amount }} ">
                            <span class="text-danger">
                                @error('amount')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="duration">Purpose</label>
                            <input style="width:95%" required name="purpose" type="text" class="form-control"
                                value="{{ $payment->purpose }} ">
                            <span class="text-danger">
                                @error('purpose')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="duration">Description</label>
                            <input style="width:95%" required name="description" type="text" class="form-control"
                                value="{{ $payment->description }} ">
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>
