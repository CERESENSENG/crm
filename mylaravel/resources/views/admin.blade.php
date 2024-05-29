<x-layout>
  <x-slot:title>
    Dashboard
  </x-slot>
  
  <div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">firstname</th>
                <th scope="col">surname</th>
                <th scope="col">Email</th>
                <th scope="col">othername</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($students as $index => $student)
                <tr>
                    <th scope="row"> {{ $index + 1 }}</th>
                    <td> {{ $student->firstname }}</td>
                    <td> {{ $student->surname }}</td>
                    <td> {{ $student->email }}</td>
                    <td> {{ $student->othername }}</td>
                    <td> {{ $student->hostel }}</td>
                    <td>
                        <button type="button" class="btn btn-primary">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach





        </tbody>
    </table>



</div>
  

</x-layout>

