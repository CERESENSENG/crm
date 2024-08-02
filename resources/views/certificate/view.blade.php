<x-layout>
    <x-slot:title>
        Cerificate :: View
    </x-slot:title>




    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <i class='fa-dolid fa-pen-to-square' style='font-size:36px'></i>
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}

                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('danger') }}

                            </div>
                        @endif

                        <h4 class="card-title">Student Certificate</h4>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Matric No</th>
                                        <th>Admission Year</th>
                                        <th>Department</th>
                                        <th>Certificate No</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $index => $student)
                                        <tr>
                                            <td scope="row">{{ $index + 1 }}</td>
                                            <td> {{ ucfirst(strtolower($student->surname)) }}
                                                {{ ucfirst(strtolower($student->firstname)) }}
                                                {{ ucfirst(strtolower($student->othername)) }} </td>
                                            <td><a
                                              href="{{ route('applicant.FullDetails') }}? app_no={{ urlencode($student->app_no) }}">{{ $student->app_no }}</a></td>
                                            <td>{{ $student->admission_year }}</td>
                                            <td>{{ $student->department->name }} </td>
                                            <td>{{ $student->certificate_no }} </td>

                                            <td>

                                                <a class="" href="#" data-toggle="modal"
                                                    data-target="#basicModal{{ $student->id }}"> <i
                                                        class='fas fa-edit' style='font-size:20px'></i></a>
                                                @include('certificate.edit')




                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Matric No</th>
                                        <th>Admission Year</th>
                                        <th>Department</th>
                                        <th>Certificate No</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>

</x-layout>
