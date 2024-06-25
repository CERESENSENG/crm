<x-layout>
  <x-slot:title>
    Edit Students
  </x-slot>
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
                      <a href="{{ route('student.edit',['id'=>$student->id])  }}">
                        <button type="submit" class="btn btn-primary">Edit</button>
                      </a>

                     
                      
                         
                      <button style="margin-left: 10px" type="submit" class="btn btn-danger">Delete</button>
                       

                
                      
                   
                </td>
            </tr>
            @endforeach
        





    </tbody>
</table>

</x-layout>