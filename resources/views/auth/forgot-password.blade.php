 {{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>  --}}
 <x-pages-layout>
     <x-slot:title>
         Forgot :: Password
     </x-slot:title>

     <section class="vh-70">

         <div class="container ">
             <div class="card">
                 <div class="card-header bg-secondary text-white">Forgot Password</div>
                 <div class="card-body">
                     <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                         {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                     </div>
                     <!-- Session Status -->
                     <x-auth-session-status class="mb-4" :status="session('status')" />
                     <form method="POST" action="{{ route('password.email') }}">
                         @csrf
                         <div data-mdb-input-init class="form-outline mb-2">
                             <label class="form-label" for="email" :value="__('Email')" class="form-label">Email
                                 address</label>
                             <input style="width: 50%" id="email" type="email" name="email"
                                 :value="old('email')" required autofocus
                                 class="form-control form-control-lg border border-primary" />
                             <x-input-error :messages="$errors->get('email')" class="mt-2" />
                         </div>

                         <button type="submit" class="btn btn-primary"> {{ __('Email Password Reset Link') }}</button>

                     </form>



                 </div>
             </div>
         </div>
     </section>




 </x-pages-layout>
