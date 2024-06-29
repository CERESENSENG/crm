<x-pages-layout>
    <x-slot:title>
        Complete Payments
    </x-slot:title>
    <div class="container">
        <div class="row">
            <div class="col">
                @if (session('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
                <form action="{{ route('getexisting.payment') }}" method="Post">
                  @csrf

                    <label for="exampleDataList" class="form-label">Enter application Number To complete your
                        payment</label>

                    <input name="app_no" class="form-control" id="exampleDataList" placeholder="Type to search...">

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
            <div class="col">

            </div>

        </div>

    </div>

</x-pages-layout>
