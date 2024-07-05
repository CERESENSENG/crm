{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <script src="{{ asset('asset/js/bootstrap.js') }}"></script>
    <title>Document</title>
    <style>
        .struct {
            display: flex;
            align-items: center;

        }


        .cere {
            color: blueviolet;
            font-size: 50px;
        }

    </style>
</head>

<body class="">

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="text-center mt-4">
                    <img height="30%"  src="/asset/images/ceresense_logo.png" alt="">
                    <h6><a href="">www.ceresense.com.ng</a></h6>
                    <h6 class="fw-light">No 2,foyeke street,opposite tawheed junction, basin, ilorin, kwara state.</h6>
                    <h6 class="display-6">Applicant Details</h6>
                </div>
            </div>
            <h1>Applicant information</h1>
        </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-10">
           <div style="overflow-x: hidden" class="table-responsive">
               <table class="table table-borderless">
                   <thead>
                       <tr>

                           <th scope="col"></th>
                           <th scope="col"></th>
                           <th scope="col"></th>
                           <th scope="col"></th>
                           <th scope="col"></th>
                           <th scope="col"></th>
                       </tr>
                   </thead>
                   <tbody>



                       <tr>
                           <td>
                               <div class="struct">
                                   <h5>Firstname:</h5>
                                   <h4 class="ms-3 fw-light">{{ $student->firstname }} </h4>
                               </div>
                           </td>
                       </tr>
                       <tr>
                           <td>

                               <div class="struct">
                                   <h5>Surname:</h5>
                                   <h4 class="ms-3 fw-light">{{ $student->surname }} </h4>
                               </div>


                           </td>
                       </tr>
                       <tr>
                           <td>

                               <div class="struct">
                                   <h5>Othername:</h5>
                                   <h4 class="ms-3 fw-light">{{ $student->othername }} </h4>
                               </div>


                           </td>

                       </tr>
                       <tr>
                           <td>

                               <div class="struct">
                                   <h5>Application Number:</h5>
                                   <h4 class="ms-3 fw-light">{{ $student->app_no }} </h4>
                               </div>


                           </td>

                       </tr>
                       <tr>
                           <td>

                               <div class="struct">
                                   <h5>Method Of Payment:</h5>
                                   <h4 class="ms-3 fw-light">{{ $student->payment_method }} </h4>
                               </div>


                           </td>

                       </tr>
                
                       <tr>
                           <td>

                               <div class="struct">
                                   <h5>Email Address:</h5>
                                   <h4 class="ms-3 fw-light">{{ $student->email }} </h4>


                               </div>


                           </td 
                       </tr>
                       <tr>
                           <td>

                               <div class="struct">
                                   <h5>Course Applied:</h5>
                                   <h4 class="ms-3 fw-light">{{ $student->department->name }} </h4>


                               </div>


                           </td>
                       </tr>
                       <tr>
                           <td>

                               <div class="struct">
                                   <h5>Next of Kin:</h5>
                                   <h4 class="ms-3 fw-light">{{ $student->next_of_kin }} </h4>


                               </div>


                           </td>
                       </tr>
                       <tr>
                           <td>

                               <div class="struct">
                                   <h5>Next of Kin Phone Number:</h5>
                                   <h4 class="ms-3 fw-light">{{ $student->next_of_kin_phone }} </h4>


                               </div>


                           </td>
                       </tr>
                       <tr>
                           <td>

                               <div class="struct">
                                   <h5>Permanent Address:</h5>
                                   <h4 class="ms-3 fw-light">{{ $student->address }} </h4>
                               </div>


                           </td>
                       </tr>  
                       <tr>
                        <td>

                            <div class="struct">
                                <h5>Sponsors:</h5>
                                <h4 class="ms-3 fw-light">{{ $student->sponsors }} </h4>
                            </div>


                        </td>
                    </tr> 
                    <tr>
                      <td>

                          <div class="struct">
                              <h5>Sponsors Phone:</h5>
                              <h4 class="ms-3 fw-light">{{ $student->sponsor_phone }} </h4>
                          </div>


                      </td>
                  </tr> 
                    <tr>
                      <td>

                          <div class="struct">
                              <h5>Wifi:</h5>
                              <h4 class="ms-3 fw-light">{{ $student->wifi }} </h4>
                          </div>


                      </td>
                  </tr>
                  <tr>
                    <td>

                        <div class="struct">
                            <h5>Skill Monetization:</h5>
                            <h4 class="ms-3 fw-light">{{ $student->skill_monetization }} </h4>
                        </div>


                    </td>
                </tr>
                <tr>
                  <td>

                      <div class="struct">
                          <h5>Hostel:</h5>
                          <h4 class="ms-3 fw-light">{{ $student->hostel}} </h4>
                      </div>


                  </td>
              </tr>   

                   </tbody>
               </table>



           </div>

       </div>
       <div class="col-2">
           <img style="" width="100px" height="100px" src="{{ asset('upload/' . $student->passport) }}"
               alt="">


       </div>
   </div>
        

    </div>



</body>

</html> --}}

<x-slip>
<x-slot:title>
    Full Applicant :: Details
</x-slot:title>



<div class="col-10">
    <div class="info-item"><strong>Firstname:</strong> {{ucfirst(strtolower($student->firstname) )}}</div>
    <div class="info-item"><strong>Surname:</strong> {{ucfirst(strtolower( $student->surname ))}}</div>
    <div class="info-item"><strong>Othername:</strong> {{ ucfirst(strtolower( $student->othername ))}}</div>
    <div class="info-item"><strong>Application Number:</strong> {{ $student->app_no }}</div>
    <div class="info-item"><strong>Method Of Payment:</strong> {{ $student->payment_method }}</div>
    <div class="info-item"><strong>Email Address:</strong> {{ $student->email }}</div>
    <div class="info-item"><strong>Course Applied:</strong> {{ $student->department->name }}</div>
    <div class="info-item"><strong>Next of Kin:</strong> {{ $student->next_of_kin }}</div>
    <div class="info-item"><strong>Next of Kin Phone Number:</strong> {{ $student->next_of_kin_phone }}</div>
    <div class="info-item"><strong>Permanent Address:</strong> {{ $student->address }}</div>
    <div class="info-item"><strong>Sponsor:</strong> {{ $student->sponsors }}</div>
    <div class="info-item"><strong>Sponsor Phone:</strong> {{ $student->sponsor_phone }}</div>
    <div class="info-item"><strong>Wifi:</strong> {{ $student->wifi }}</div>
    <div class="info-item"><strong>Hostel:</strong> {{ $student->hostel }}</div>
    <div class="info-item"><strong>Skill Monetization:</strong> {{ $student->skill_monetization }}</div>
    
</div>
<div class="col-2">
    <div class="text-right student-info">
        <img style="" width="100px" height="100px" src="{{ asset('upload/' . $student->passport) }}"
        alt="">
    </div>
</div>


</x-slip>
