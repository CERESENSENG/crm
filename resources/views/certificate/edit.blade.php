<form action="{{ route('edit.certificate',['student_id' => $student->id]) }}" method="post" enctype="multipart/form-data">
  @method('put')
  @csrf

  <div class="bootstrap-modal">
      <div class="modal fade" id="basicModal{{ $student->id }}">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Add certificate</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                  
                      <div class="form-group">
                          <label for="certificate">Certificate No</label>
                          <input style="width:95%"  required name="certificate_no" type="text" class="form-control"
                              value="">
                          <span class="text-danger">
                              @error('certificate_no')
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
