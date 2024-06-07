<x-card>
  <x-slot:title>
    Congratulations
  </x-slot:title>
  <div>
    <p>Hi {{$firstname}}, </p>
    <p>Your application has been completed Successfully.</p>
    <p>The following are your application details:</p>
    <h6>Applcation No :  {{$appno}}</h6>
    <h6>Name:  {{$surname}}  {{$firstname}} </h6>
    <h6>Course applied:  {{$course}} </h6>
    <p>Click here to print your application slip</p>
    <a href="{{ route('applicationSlip') }}?app_no={{ urlencode($appno) }}">
      <button type="button" class="btn btn-success">Print application slip</button>
    </a>
  </div>
</x-card>
 
