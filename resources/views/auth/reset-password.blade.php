{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

 <x-pages-layout>
<x-slot:title>
    Reset ::Paswword
</x-slot:title>
<section class="vh-70">

    <div class="container ">
        <div class="card">
            <div class="card-header bg-secondary text-white">Reset Password</div>
            <div class="card-body">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
            
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div data-mdb-input-init class="form-outline mb-2">
                        <label class="form-label" for="email" :value="__('Email')">Email
                            address</label>
                        <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" 
                            class="form-control form-control-lg border border-primary" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div data-mdb-input-init class="form-outline mb-2">
                        <label class="form-label" for="password" :value="__('Password')"> Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" 
                            class="form-control form-control-lg border border-primary" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div data-mdb-input-init class="form-outline mb-2">
                        <label class="form-label" for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>
                        <input id="password_confirmation" type="password"name="password_confirmation" required autocomplete="new-password" 
                            class="form-control form-control-lg border border-primary" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button type="btn" class="btn btn-primary">  {{ __('Reset Password') }}</button>

                

                </form>
            </div>
        </div>
    </div>
</section>



</x-pages-layout> 
