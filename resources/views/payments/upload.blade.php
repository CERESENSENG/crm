<x-layout>
  <x-slot:title>
    Upload
  </x-slot:title>

  <div class="col-lg-12">
    <div class="card">
      @if (session('success'))
      <div class="alert alert-success mb-3">
        {{ session('success') }}

      </div>
        
      @endif


        <div class="card-body mt-3">
            <h4 class="card-title">Mass Upload of Existing Payments</h4>
           
              <a href="{{ asset('asset/csv/payments.csv')}}" download> 
                <button type="button" class="btn mb-1 btn-success">Download CSV sample</button>

              </a>
           
        
    
            
            <div class="basic-form">
                <form action="{{ route('payment.upload') }} " method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"><span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input name="csv" type="file" class="custom-file-input" required>
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  
                </form>

                
            </div>
        </div>
    </div>
</div>
</x-layout>