<form action="{{ route('delete.schedule',['id' => $payment->id]) }}" method="post" enctype="multipart/form-data">
  @method('delete')
  @csrf

    <div class="bootstrap-modal">
        <div class="modal fade" id="basicModalDelete{{$payment->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Payment Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure you want to delete <b>{{ $payment->department->name }}</b></div>
                    <input type="hidden"  name="student_id" type="text" value="{{ $payment->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel </button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>
