
<x-pages-layout>
    <x-slot:title>
        Application - Registration :: Stage 1
    </x-slot:title>
    <div class="container">
        <div class="card mt-2">
            <div class="card-header bg-secondary text-white">STEP 1/2 - BIO-DATA</div>
            <div class="card-body">
                <form action="{{ route('register.stage-1.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">First name</label>
                        <input required name="firstname" type="text" class="form-control mt-2" value="{{ old('firstname') }}">
                        <span class="text-danger">
                            @error('firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="surname">Surname</label>
                        <input required name="surname" type="text" class="form-control mt-2" value="{{ old('surname') }}">
                        <span class="text-danger">
                            @error('surname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="othername">Other name</label>
                        <input required name="othername" type="text" class="form-control mt-2" value="{{ old('othername') }}">
                        <span class="text-danger">
                            @error('othername')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="phone">Phone number</label>
                        <input required name="phone" type="number" class="form-control mt-2" value="{{ old('phone') }}">
                        <span class="text-danger">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input required name="password" type="password" class="form-control mt-2">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="next_of_kin">Next of Kin</label>
                        <input required name="next_of_kin" type="text" class="form-control mt-2" value="{{ old('next_of_kin') }}">
                        <span class="text-danger">
                            @error('next_of_kin')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Email address</label>
                        <input required name='email' type="email" class="form-control mt-2" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="sponsors">Sponsors</label>
                        <input required name="sponsors" type="text" class="form-control mt-2" value="{{ old('sponsors') }}">
                        <span class="text-danger">
                            @error('sponsors')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mt-2">
                        <label for="sponsor_phone">Sponsors phone number</label>
                        <input required name="sponsor_phone" type="text" class="form-control mt-2" value="{{ old('sponsor_phone') }}">
                        <span class="text-danger">
                            @error('sponsor_phone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button style="float: right;" type="submit" class="btn btn-primary mt-4">NEXT</button>
                </form>
            </div>
        </div>
    </div>

</x-pages-layout>
