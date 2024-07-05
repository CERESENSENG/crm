<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Search Students</h4>
                        <div class="basic-form">
                            <form action="{{ route('student.search') }}">

                                <div class="row">
                                    <div class="col">
                                        <label>Application No</label>
                                        <input name="app_no" type="text" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label>Departments</label>
                                        <select name="department_id" id="inputState" class="form-control">
                                            <option value=''>Select a department</option>
                                            @foreach ($depts as $dept)
                                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="col">
                                        <label>Cohorts</label>
                                        <select id="cohort" name="cohort" class="form-control">
                                            <option id="cohort" value=''>Choose a cohorts</option>
                                            @foreach ($cohorts as $cohort)
                                                <option value="{{ $cohort }}">{{ $cohort }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group col">
                                        <label>Year</label>
                                        <select name="admission_year" id="admission_year" class="form-control">
                                            <option value=''>Select Year</option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year['name'] }}">{{ $year['name'] }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                @if (session('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}

                    </div>
                @endif


                <div class="">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Matric No </th>
                                        <th scope="col">Dept</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($studentList as $index => $student)
                                        <tr>
                                            <td scope="row"> {{ $index + 1 }}</td>
                                            <td> {{ $student->firstname }} {{ $student->surname }}
                                                {{ $student->othername }}</td>
                                            <td><a
                                                    href="{{ route('applicant.FullDetails') }}? app_no={{ urlencode($student->app_no) }}">{{ $student->app_no }}</a>
                                            </td>
                                            <td> {{ $student->department->name }}</td>
                                            <td>{{ $student->phone }} </td>
                                            <td>{{ $student->email }} </td>

                                            <td>


                                            </td>
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


</x-layout>
