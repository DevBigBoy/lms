{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('frontend.master')


@section('home')
    <!-- ================================ START BREADCRUMB AREA ================================= -->
    <section class="breadcrumb-area section-padding img-bg-2">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                <div class="section-heading">
                    <h2 class="section__title text-white">Register</h2>
                </div>
                <ul
                    class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Register</li>
                </ul>
            </div><!-- end breadcrumb-content -->
        </div><!-- end container -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================ END BREADCRUMB AREA ================================= -->

    <!-- ================================  START CONTACT AREA ================================= -->
    <section class="contact-area section--padding position-relative">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <span class="ring-shape ring-shape-4"></span>
        <span class="ring-shape ring-shape-5"></span>
        <span class="ring-shape ring-shape-6"></span>
        <span class="ring-shape ring-shape-7"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title text-center fs-24 lh-35 pb-4">Create an Account and <br> Start Learning!
                            </h3>
                            <div class="section-block"></div>
                            <form method="POST" action="{{ route('register') }}" class="pt-4">
                                @csrf
                                <div class="d-flex flex-wrap align-items-center pb-4">
                                    <button class="btn theme-btn flex-grow-1 mx-2 mb-2">
                                        <i class="la la-google mr-2"></i>Google
                                    </button>
                                    <button class="btn theme-btn flex-grow-1 mx-2 mb-2">
                                        <i class="la la-facebook mr-2"></i>Facebook
                                    </button>
                                    <button class="btn theme-btn flex-grow-1 mx-2 mb-2">
                                        <i class="la la-twitter mr-2"></i>Twitter
                                    </button>
                                </div>
                                <div class="text-center pt-3 pb-4">
                                    <div class="icon-element icon-element-md fs-25 shadow-sm">Or</div>
                                </div>
                                {{-- Name --}}
                                <div class="input-box">
                                    <label class="label-text" for="name">Name</label>
                                    <div class="form-group">
                                        <input id="name" type="text" name="name" autocomplete="name"
                                            class="form-control form--control @error('name')
                                            is-invalid
                                        @enderror"
                                            placeholder="Enter Full Name" value="{{ old('name') }}" required autofocus>
                                        <span class="la la-user input-icon"></span>

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- end input-box -->

                                {{-- Email --}}
                                <div class="input-box">
                                    <label class="label-text" for="email">Email Address</label>
                                    <div class="form-group">
                                        <input id="email" type="email" name="email"
                                            class="form-control form--control @error('email')
                                            is-invalid
                                        @enderror"
                                            placeholder="Enter email address" value="{{ old('email') }}" required
                                            autocomplete="username">
                                        <span class="la la-envelope input-icon"></span>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- end input-box -->

                                {{-- password --}}
                                <div class="input-box">
                                    <label class="label-text" for="password">Password</label>
                                    <div class="input-group mb-3">
                                        <span class="la la-lock input-icon"></span>
                                        <input id="password" type="password" name="password"
                                            class="form-control form--control password-field @error('password')
                                            is-invalid
                                        @enderror"
                                            placeholder="Password" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <button class="btn theme-btn theme-btn-transparent toggle-password"
                                                type="button">
                                                <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px"
                                                    viewBox="0 0 24 24" width="22px" fill="#7f8897">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z" />
                                                </svg>
                                                <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px"
                                                    viewBox="0 0 24 24" width="22px" fill="#7f8897">
                                                    <path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z"
                                                        fill="none" />
                                                    <path
                                                        d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z" />
                                                </svg>
                                            </button>
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- end input-box -->

                                {{-- password confirmation --}}
                                <div class="input-box">
                                    <label class="label-text" for="password_confirmation">Password</label>
                                    <div class="input-group mb-3">
                                        <span class="la la-lock input-icon"></span>
                                        <input class="form-control form--control password-field"
                                            placeholder=" Confirm Password" id="password_confirmation" type="password"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <button class="btn theme-btn theme-btn-transparent toggle-password"
                                                type="button">
                                                <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px"
                                                    viewBox="0 0 24 24" width="22px" fill="#7f8897">
                                                    <path d=" M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z" />
                                                </svg>
                                                <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px"
                                                    viewBox="0 0 24 24" width="22px" fill="#7f8897">
                                                    <path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z"
                                                        fill="none" />
                                                    <path
                                                        d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z" />
                                                </svg>
                                            </button>
                                        </div>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- end input-box -->

                                <div class="btn-box">
                                    <div class="custom-control custom-checkbox mb-2 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="receiveCheckbox"
                                            required>
                                        <label class="custom-control-label custom--control-label lh-20"
                                            for="receiveCheckbox">
                                            Yes! I want to get the most out of Aduca by receiving emails with exclusive
                                            deals, personal recommendations and learning tips!
                                        </label>
                                    </div><!-- end custom-control -->
                                    <div class="custom-control custom-checkbox mb-4 fs-15">
                                        <input type="checkbox" class="custom-control-input" id="agreeCheckbox" required>
                                        <label class="custom-control-label custom--control-label" for="agreeCheckbox">
                                            by signing i agree to the
                                            <a href="terms-and-conditions.html" class="text-color hover-underline">
                                                terms and conditions
                                            </a> and
                                            <a href="privacy-policy.html" class="text-color hover-underline">
                                                privacy polic
                                            </a>
                                        </label>
                                    </div><!-- end custom-control -->
                                    <button class="btn theme-btn" type="submit">
                                        Register Account
                                        <i class="la la-arrow-right icon ml-1"></i>
                                    </button>
                                    <p class="fs-14 pt-2">Already have an account?
                                        <a href="{{ route('login') }}" class="text-color hover-underline">Log in</a>
                                    </p>
                                </div><!-- end btn-box -->
                            </form>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col-lg-7 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <!-- ================================ END CONTACT AREA ================================= -->
@endsection
