<x-card>
  <img height="30%"  src="/asset/images/ceresense_logo.png" alt="">
  <x-slot:title>
    <h6>Congratulations</h6>
  </x-slot:title>
  <div>
    <p>Hi {{$firstname}}, </p>
    <p>We are pleased to inform you that you  have been offerred admission @ Ceresense Tech Institute.</p>
    <p>The following are your admission details:</p>
    <h6>Applcation No :  {{$appno}}</h6>
    <h6>Name:{{$surname}}  {{$firstname}} {{ $othername }}</h6>
    <h6>Course offered:  {{$course}} </h6>
     <p>Click here to print your admission letter</p>
    <a  target="_blank" href="{{ route('appNo.home',['appNo'=>$appno]) }}">
      <button type="button" class="btn btn-success">Print admission letter</button>
    </a> 
  </div>
</x-card>
 
