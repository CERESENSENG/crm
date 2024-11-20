

@if ($errors->any())

<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      Please check the form below for errors: <br/>
      @foreach ($errors->all() as $error)
      {{ $error }}<br>
  @endforeach
    </div>
  </div>
  @endif

         @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible show fade"   role="alert" >
                        <div class="alert-body">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          {!! $message !!}
                        </div>
                      </div>



                    @endif

                    @if ( $message = Session::get('error')  )
                    <div class="alert alert-danger alert-dismissible show fade"    role="alert" >
                        <div class="alert-body">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          {!! $message !!}
                        </div>
                      </div>
                    @endif
{{--
                    @if (isset($error) )
                    <div class="alert alert-danger alert-dismissible show fade"    role="alert" >
                        <div class="alert-body">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          {!! $error !!}
                        </div>
                      </div>
                    @endif --}}

                    @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-dismissible show fade"    role="alert"  >
                        <div class="alert-body">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          {!! $message !!}
                        </div>
                      </div>
                    @endif

                    @if ($message = Session::get('info'))
                    <div class="alert alert-info alert-dismissible show fade"    role="alert" >
                        <div class="alert-body">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          {!! $message !!}
                        </div>
                      </div>
                    @endif


                    @if ($message = Session::get('messages'))

                    @foreach($message as $msg )

                      <div class="{{ ($msg->status)?'text-success':'text-danger'  }}" >{{ $msg->data}} </div>
                  @endforeach
                    @endif
