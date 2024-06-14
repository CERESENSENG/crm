<x-layout>
  <x-slot:title>
   Admission Menu
  </x-slot:title>
 <div class="container">
  <ul class="nav nav-pills nav-justified">
    <li class="nav-item">
      <a class="nav-link " href="{{route('admissionPending.show')}}">Pending</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" aria-current="page"  href="{{route('admissionApprove.show')}}">Approve</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="{{route('admissionReject.show')}}">Reject</a>
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
              </tr>
          @endforeach



      </tbody>
  </table>



</div>
 
</x-layout>