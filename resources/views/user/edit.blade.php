<form action="{{ route('edit.user',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
  @method('put')
  @csrf

  <div class="bootstrap-modal">
      <div class="modal fade" id="basicModalEditUser{{$user->id}}">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Edit User</h5>
                      <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                  
                      <div class="form-group">
                          <label for="name">Name</label>
                          <input  required name="name" type="text" class="form-control"
                              value="{{ $user->name }}">
                          <span class="text-danger">
                              @error('name')
                                  {{ $message }}
                              @enderror
                          </span>
                      </div>
                      {{-- <div class="form-group">
                          <label for="email">Email</label>
                          <input  required name="email" type="email" class="form-control"
                              value="{{ $user->email }} ">
                          <span class="text-danger">
                              @error('email')
                                  {{ $message }}
                              @enderror
                          </span>
                      </div> --}}
                      <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input  required name="phone" type="text" class="form-control"
                            value="{{ $user->phone }} ">
                        <span class="text-danger">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                      {{-- <div class="form-group">
                        <label for="password">Password</label>
                        <input  required name="password" type="password" class="form-control"
                            value="{{ $user->password }} ">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div> --}}

                    <input type="hidden" value="{{ $user->id }}}}">
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
