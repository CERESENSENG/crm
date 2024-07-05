<x-layout>
  <x-slot:title>
      Confirm Page
  </x-slot>
  <div class="row mt-5">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                <div class="card-title"> Confirm Payment Data</div>
                  <form method="POST" action="{{ route('certificate.storecsv') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                      @csrf
                      @method('put')
                      <table class="table table-striped table-hover mt-3">
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Matric No</th>
                              <th>Cerificate Id</th>
                              {{-- <th>Amount</th>
                              <th>Amount-due</th>
                              <th>Status</th>
                              <th>Student Matric</th> --}}
                              <th>Comment(s)</th>
                          </tr>
                          @foreach ($confirms as $index => $confirm)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>{{ $confirm->student_name}}</td>
                                  <td>{!! ($confirm->error_in_matric)?  '<span class="text-danger" >'. $confirm->matric_no .'</span>' : $confirm->matric_no !!} </td>
                                   <td>{{ $confirm->certificate_id}}</td>  
                                   {{-- <td>{!! ($confirm->certificate_id)??'<span class="text-danger">***</span>'  !!} </td>  --}}
                                  <td>{!! $confirm->error ? '<span class="text-danger">' . $confirm->comment . '</span>' : '<span class="text-success">' . $confirm->comment . '</span>' !!}</td>
                              
                              <!-- Hidden inputs -->
                              <input type="hidden" name="data[{{ $index }}][student_id]" value="{{ $confirm->student_id }}">
                              <input type="hidden" name="data[{{ $index }}][matric_no]" value="{{ $confirm->matric_no}}">
                              <input type="hidden" name="data[{{ $index }}][certificate_id]" value="{{ $confirm->certificate_id}}">
                             

                          @endforeach
                      </table>
                      <div style="float:right">
                          @if (!$CSV_ERR)
                              <button type="submit" class="btn btn-success btn-large">Submit</button>
                          @endif
                      </div>
                  </form>
              </div>
          </div>
      </div>

  </div>
</x-layout>
