<form action="{{ route('edit.dept', ['id' => $dept->id]) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="bootstrap-modal">
        <div class="modal fade" id="basicModal{{ $dept->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit A Department</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="department_name">Department name</label>
                            <input style="width: 95%" required name="name" type="text" class="form-control"
                                value="{{ $dept->name }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Department_code">Department Code</label>
                            <input style="width: 95%" required name="department_code" type="text" class="form-control"
                                value="{{ $dept->department_code }}">
                            <span class="text-danger">
                                @error('department_code')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input style="width: 95%" required name="duration" type="text" class="form-control"
                                value="{{ $dept->duration }}">
                            <span class="text-danger">
                                @error('duration')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="duration">Frequency</label>
                            <input style="width: 95%" required name="frequency" type="text" class="form-control"
                                value="{{ $dept->frequency }}">
                            <span class="text-danger">
                                @error('frequency')
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
