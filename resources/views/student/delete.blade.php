<form action="{{ route('student.destroy',['student'=>$student->id]) }}" method="post" enctype="multipart/form-data">
  @method('delete')
  @csrf

    <div class="bootstrap-modal">
        <div class="modal fade" id="basicModal{{ $student->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ 'Delete Student' }}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure you want to delete <b>{{$student->firstname }}  {{$student->surname }}  {{$student->othername }}</b></div>
                    <input type="hidden"  name="student_id" type="text" value="{{ $student->id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ 'Cancel' }}</button>
                        <button type="submit" class="btn btn-primary">{{ 'Yes' }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>
