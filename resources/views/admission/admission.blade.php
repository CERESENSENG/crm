<x-layout>
    <x-slot:title>
        Admission Menu
    </x-slot:title>


    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Admission Menu</div>

                    <div class="container">
                        <br>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">Pending</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1">Approved</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">Rejected</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
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


                                        @foreach ($pendingStudents as $index => $student)
                                            <tr>
                                                <td scope="row"> {{ $index + 1 }}</td>
                                                <td> {{ucfirst(strtolower($student->firstname ))}} {{ ucfirst(strtolower( $student->surname)) }}
                                                    {{ucfirst(strtolower( $student->othername ))}}</td>
                                                <td><a
                                                        href="{{ route('applicant.FullDetails') }}? app_no={{ urlencode($student->app_no) }}">{{ $student->app_no }}</a>
                                                </td>
                                                <td> {{ $student->department->name }}</td>
                                                <td>{{ $student->phone }} </td>

                                                <td>
                                                    <div style="display: flex">
                                                        <form method="POST"
                                                            action="{{ route('approve', ['id' => $student->id]) }}">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-primary">Approve</button>
                                                        </form>
                                                        <form action="{{ route('reject', ['id' => $student->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button style="margin-left: 10px" type="submit"
                                                                class="btn btn-danger">Reject</button>
                                                        </form>

                                                    </div>


                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (session('message'))
                                            <div class="alert alert-success">
                                                {{ session('message') }}

                                            </div>
                                        @elseif(session('rejectMessage'))
                                            <div class="alert alert-danger">
                                                {{ session('rejectMessage') }}

                                            </div>
                                        @endif







                                    </tbody>
                                </table>
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
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
                                        @foreach ($approveStudents as $index => $student)
                                            <tr>
                                                <td scope="row"> {{ $index + 1 }}</td>
                                                <td> {{ucfirst(strtolower($student->firstname)) }} {{ucfirst(strtolower( $student->surname)) }}
                                                    {{ucfirst(strtolower( $student->othername)) }}</td>
                                                <td><a
                                                        href="{{ route('applicant.FullDetails') }}? app_no={{ urlencode($student->app_no) }}">{{ $student->app_no }}</a>
                                                </td>
                                                <td> {{ $student->department->name }}</td>
                                                <td>{{ $student->phone }} </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
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
                                        @foreach ($rejectedStudents as $index => $student)
                                            <tr>
                                                <td scope="row"> {{ $index + 1 }}</td>
                                                <td> {{ ucfirst(strtolower($student->firstname)) }} {{ ucfirst(strtolower($student->surname)) }}
                                                    {{ ucfirst(strtolower($student->othername)) }}</td>
                                                <td><a
                                                        href="{{ route('applicant.FullDetails') }}? app_no={{ urlencode($student->app_no) }}">{{ $student->app_no }}</a>
                                                </td>
                                                <td> {{ $student->department->name }}</td>
                                                <td>{{ $student->phone }} </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</x-layout>
