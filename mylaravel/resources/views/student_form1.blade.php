<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <script src="{{ asset('asset/js/bootstrap.js') }}"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-secondary text-white">STEP 1/2 - BIO-DATA</div>
            <div class="card-body">
                <form action="{{ route('register.store1') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">First name</label>
                        <input required name="firstname" type="text" class="form-control" value="{{ old('firstname') }}">
                        <span class="text-danger">
                            @error('firstname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input required name="surname" type="text" class="form-control" value="{{ old('surname') }}">
                        <span class="text-danger">
                            @error('surname')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="othername">Other name</label>
                        <input required name="othername" type="text" class="form-control" value="{{ old('othername') }}">
                        <span class="text-danger">
                            @error('othername')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input required name="phone" type="number" class="form-control" value="{{ old('phone') }}">
                        <span class="text-danger">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required name="password" type="password" class="form-control">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="next_of_kin">Next of Kin</label>
                        <input required name="next_of_kin" type="text" class="form-control" value="{{ old('next_of_kin') }}">
                        <span class="text-danger">
                            @error('next_of_kin')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input required name='email' type="email" class="form-control" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="sponsors">Sponsors</label>
                        <input required name="sponsors" type="text" class="form-control" value="{{ old('sponsors') }}">
                        <span class="text-danger">
                            @error('sponsors')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="sponsor_phone">Sponsors phone number</label>
                        <input required name="sponsor_phone" type="text" class="form-control" value="{{ old('sponsor_phone') }}">
                        <span class="text-danger">
                            @error('sponsor_phone')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">NEXT</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>