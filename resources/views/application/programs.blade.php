<x-pages-layout>

  <x-slot:title>
    Available :: Programs
  </x-slot:title>


  <main class="cd__main container">
    <h4 class="text-center fw-bold mb-5">AVAILABLE PROGRAMS AT CERESENSE TRAINING INSTITUTE</h4>
    <!-- Start DEMO HTML (Use the following code into your project)-->
    <table id="example" class="table table-striped" style="width:100%">
   <thead>
       <tr>
           <th>#</th>
           <th>Program Name</th>
           <th>Duration</th>
           <th>Price</th>
           <th>Frequency</th>
           
       </tr>
   </thead>
   <tbody>
@foreach ( $depts as $index => $dept)
       <tr>
           <td>{{ $index + 1 }}</td>
           <td>{{ $dept->department->name}}</td>
           <td>{{ $dept->department->duration }}</td>
           <td>&#8358;{{ number_format($dept->amount) }}</td>
           <td>{{ $dept->department->frequency}}</td>
          
        </tr>
       @endforeach
   </tbody>
   <tfoot>
       <tr>
        <th>#</th>
        <th>Program Name</th>
        <th>Duration</th>
        <th>Price</th>
        <th>Frequency</th>
       </tr>
   </tfoot>
</table>
<a href="{{ route('register.stage-1') }}"><button  class="btn btn-primary mt-3">Apply Now</button></a>
 </main>

</x-pages-layout>