  {{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>   --}}

  <x-pages-layout>
      <x-slot:title>
          Admin Login Page

      </x-slot>


      <section class="vh-70">
          <div class="container  h-80">
              <div class="row d-flex justify-content-center align-items-center h-90">
                  <div class="col col-xl-10">
                      <div class="card" style="border-radius: 1rem;">
                          <div class="row g-0">
                              <div class="col-md-6 col-lg-5 d-none d-md-block">
                                  <img src="{{ asset('assets/img/image1.png') }}" alt="login form"
                                      class="img-fluid login_form_image" style="border-radius: 1rem 0 0 1rem;" />
                              </div>
                              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                  <div class="card-body p-4 p-lg-5 text-black">

                                      <!-- Session Status -->
                                      <x-auth-session-status class="mb-4" :status="session('status')" />

                                      <form method="POST" action="{{ route('login') }}">
                                          @csrf

                                          <div class="d-flex align-items-center mb-3 pb-1">
                                              <img src="{{asset('assets/img/logo.png')}}" alt="">
                                          </div>



                                          <div data-mdb-input-init class="form-outline mb-2">
                                              <label class="form-label" for="email" :value="__('Email')">Email
                                                  address</label>
                                              <input id="email" type="email" name="email" :value="old('email')"
                                                  required autofocus autocomplete="username"
                                                  class="form-control form-control-lg border border-primary" />
                                              <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                          </div>

                                          <div data-mdb-input-init class="form-outline mb-2">
                                              <label class="form-label" for="password"
                                                  :value="__('Password')">Password</label>
                                              <input id="password" type="password" name="password" required
                                                  autocomplete="current-password"
                                                  class="form-control form-control-lg border border-primary" />
                                              <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                          </div>
                                          <div class="form-check">
                                              <label class="form-check-label" for="remember_me">
                                                  Remember me
                                              </label>
                                              <input class="form-check-input" value="{{ __('Remember me') }}"
                                                  id="remember_me" type="checkbox">

                                          </div>
                                          <div class=" mt-4">
                                              <button class="btn btn-primary" type="submit">
                                                  {{ __('Log in') }}</button> <br>

                                              @if (Route::has('password.request'))
                                                  <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                      href="{{ route('password.request') }}">
                                                      {{ __('Forgot your password?') }}
                                                  </a>
                                              @endif



                                          </div>
                                      </form>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </x-pages-layout>
