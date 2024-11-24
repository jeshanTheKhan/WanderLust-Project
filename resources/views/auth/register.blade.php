{{-- 
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}

        <!-- Email Address -->
        {{-- <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

        <!-- Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        <!-- Confirm Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}

    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>CelestialUI Admin</title>
      <!-- base:css -->
      <link rel="stylesheet" href="public/backend/login/vendors/typicons.font/font/typicons.css">
      <link rel="stylesheet" href="public/backend/login/vendors/css/vendor.bundle.base.css">
      <!-- endinject -->
      <!-- plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="public/backend/login/css/vertical-layout-light/style.css">
      <!-- endinject -->
      <link rel="shortcut icon" href="public/backend/login/images/favicon.png" />
    </head>
    
    <body>
      <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <div class="brand-logo" style="text-align: center">
                    <img src="public/backend/login/images/WhatsApp_Image_2024-11-19_at_20.42.42_f44f7eac-removebg-preview.png" height="150px" alt="logo">
                    <h1 style="text-align: center;color:#1E90FF">Register</h1>
                  </div>
                  <h4 style="text-align: center">New here?</h4>
                  <h6 class="font-weight-light" style="text-align: center">Signing up is easy. It only takes a few steps</h6>
                  <form class="pt-3" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" name="name" :value="old('name')" required autofocus autocomplete="name"  id="exampleInputUsername1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" name="email" :value="old('email')" required autocomplete="username"  class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" name="password"
                      required autocomplete="new-password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password"  id="exampleInputPassword1" placeholder="Confirm Password">
                      </div>
                    <div class="mb-4">
                      <div class="form-check">
                        <label class="form-check-label text-muted">
                          <input type="checkbox" class="form-check-input">
                          I agree to all Terms & Conditions
                        </label>
                      </div>
                    </div>
                    <div class="mt-3">
                      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                    </div>
                    <div class="text-center mt-4 font-weight-light">
                      Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- base:js -->
      <script src="public/backend/login/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- inject:js -->
      <script src="public/backend/login/js/off-canvas.js"></script>
      <script src="public/backend/login/js/hoverable-collapse.js"></script>
      <script src="public/backend/login/js/template.js"></script>
      <script src="public/backend/login/js/settings.js"></script>
      <script src="public/backend/login/js/todolist.js"></script>
      <!-- endinject -->
    </body>
    
    </html>
    