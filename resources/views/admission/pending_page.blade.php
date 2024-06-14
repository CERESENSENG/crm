<x-layout>
  <x-slot:title>
   Admission Menu
  </x-slot:title>
 <div class="container">
  <ul class="nav nav-pills nav-justified">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{route('admissionPending.show')}}">Pending</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="{{route('admissionApprove.show')}}">Aprrove</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admissionReject.show')}}">Reject</a>
    </li>
  </ul>
 </div>
 <div class="table-responsive mt-4">
  <table class="table table-striped table-hover">
      <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">App-no</th>
              <th scope="col">Dept</th>
              <th scope="col">Phone</th>
              <th scope="col">Action</th>
          </tr>
      </thead>
      <tbody>


          @foreach ($students as $index => $student)
              <tr>
                  <td scope="row"> {{ $index + 1 }}</td>
                  <td> {{ $student->firstname }}  {{ $student->surname }} {{ $student->othername }}</td>
                  <td><a href="{{route("applicant.FullDetails")}}? app_no={{urlencode($student->app_no)}}">{{$student->app_no}}</a></td>
                  <td> {{ $student->department->name }}</td>
                  <td>{{$student->phone}} </td>
                  
                  <td>
                    <div style="display: flex">
                      <form method="POST" action="{{ route('approve', ['id' => $student->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Approve</button>
                      </form>
                           <form action="{{route('reject',['id'=>$student->id])}}" method="POST">
                            @csrf
                            <button style="margin-left: 10px" type="submit" class="btn btn-danger">Reject</button>
                         </form> 

                    </div>
                        
                     
                  </td>
              </tr>
          @endforeach
          @if(session('message'))
          <div class="alert alert-success">
            {{session('message')}}

          </div>
          @elseif(session('rejectMessage'))
            <div class="alert alert-danger">
              {{session('rejectMessage')}}

            </div>

          

          @endif
              
          





      </tbody>
  </table>



</div>
  

</x-layout>