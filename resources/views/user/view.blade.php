<x-layout>
  <x-slot:title>
    User
  </x-slot:title>
  <div class="row mt-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">User Table</h4>
              @if (session('message'))
              <div class="alert alert-success">
                {{ session('message') }}

              </div>
              @elseif (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}

              </div>
              @elseif (session('confirm'))
              <div class="alert alert-success">
                {{ session('confirm') }}

              </div> 
              @endif
              <a class="btn btn-primary mt-1" href="#" data-toggle="modal" data-target="#basicModalCreateUser">Add New User</a>
               @include('user.create') 

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($users as $index => $user)
                            <tr>
                                <td scope="row"> {{ $index + 1 }}</td>
                                <td> {{ $user->name }}</td>
                                <td> {{ $user->email }}</td>
                                <td> {{ $user->phone }}</td>
                                <td>
                                  <div style="display: flex;">
                                    <a class="" href="#" data-toggle="modal" data-target="#basicModalEditUser{{$user->id}}"> <i class='fas fa-edit' style='font-size:20px'></i></a>
                                  @include('user.edit')
                                  <a style="margin-left: 10px" class="" href="#" data-toggle="modal"
                                   data-target="#basicModalDeleteUser{{$user->id}}"><i class='fas fa-trash-alt' style='font-size:20px;color:red'></i></a>
                                    @include('user.delete') 
                                </div>
                                </td>
                            </tr>
                        @endforeach






                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>


</x-layout>