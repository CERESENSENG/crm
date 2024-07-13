<form action="{{ route('create.schedule') }}" method="post" enctype="multipart/form-data">
  @csrf

  <div class="bootstrap-modal">
      <div class="modal fade" id="basicModalSchedule">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Add New Schedule</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Cohort</label>
                      <select required id="cohort" name="cohort" class="form-control">
                        <option  id="cohort"  value='' >Choose cohort</option>
                        @foreach ($cohorts as $cohort )
                        <option value=" {{ $cohort }}" {{ old('cohort') == $cohort ? 'selected' : ''}} >{{ $cohort }}</option>                            
                        @endforeach
                       </select>
                       <span class="text-danger">
                        @error('cohort')
                            {{ $message }}
                        @enderror
                    </span>
                        
                    </div>
                    <div class="form-group">
                        <label>Department ID</label>
                        <select required id="department-id" name="department_id" class="form-control">
                          <option  id="department_id"  value='' >Choose Department Id</option>
                          @foreach ($depts as $dept )
                          <option value="{{ $dept }}"{{ old('dept') == $dept ? 'selected' : '' }}>{{ $dept }}</option>                            
                          @endforeach
                         </select>
                         <span class="text-danger">
                            @error('department_id')
                                {{ $message }}
                            @enderror
                        </span>
                          
                      </div>
                      <div class="form-group">
                        <label>Year</label>
                        <select required id="year" name="year" class="form-control">
                          <option  id="year"  value='' >Select A Year</option>
                          @foreach ($years as $year )
                          <option value="{{ $year['name'] }}"{{ old('year') == $year ? 'selected' : ' '}}>{{ $year['name'] }}</option>                            
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
                          <input  required name="amount" type="number" class="form-control"
                              value="{{ old('amount') }} ">
                          <span class="text-danger">
                              @error('amount')
                                  {{ $message }}
                              @enderror
                          </span>
                      </div>
                      <div class="form-group">
                        <label for="duration">Description</label>
                        <input  required name="description" type="text" class="form-control"
                            value="{{ old('description') }} ">
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                      <div class="form-group">
                        <label>Purpose</label>
                        <select required id="purpose" name="purpose" class="form-control">
                          <option  id="purpose"  value='' >Select Purpose</option>
                          @foreach ($purposes as $purpose )
                          <option value="{{ $purpose }}"{{ old('purpose') == $purpose ? 'selected' : ' ' }}>{{ $purpose }}</option>                            
                          @endforeach
                         </select>
                         <span class="text-danger">
                            @error('purpose')
                                {{ $message }}
                            @enderror
                        </span>
                          
                      </div>
                    
                     

                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                  </div>
              </div>
          </div>
      </div>
  </div>


</form>
