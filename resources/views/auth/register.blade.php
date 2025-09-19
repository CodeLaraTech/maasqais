@extends('layouts.base')

@section('content')
<div class="container my-auto mt-5">
    <div class="row signin-margin">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign up</h4>
                    </div>
                </div>
                <div class="card-body">
                   <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name -->
                        <div class="input-group input-group-outline mt-3 @if(strlen(old('name')) > 0) is-filled @endif">
                            <label class="form-label" for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            @error('name')
                            <p class='text-danger inputerror'>{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="input-group input-group-outline mt-4 @if(strlen(old('email')) > 0) is-filled @endif">
                            <label class="form-label" for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" :value="old('email')" required autocomplete="username" />
                            @error('email')
                            <p class='text-danger inputerror'>{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="input-group input-group-outline mt-4 @if(strlen(old('password')) > 0) is-filled @endif">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" />
                            @error('password')
                            <p class='text-danger inputerror'>{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="input-group input-group-outline mt-4 @if(strlen(old('password_confirmation')) > 0) is-filled @endif">
                            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" />
                            @error('password_confirmation')
                            <p class='text-danger inputerror'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Register</button>
                        </div>

                        <p class="mt-4 text-sm text-center">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Sign In</a>
                        </p>

                        @if (Route::has('password.request'))
                        <p class="text-sm text-center">
                            Forgot your password? Reset your password
                            <a href="{{ route('password.request') }}" class="text-primary text-gradient font-weight-bold">here</a>
                        </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
