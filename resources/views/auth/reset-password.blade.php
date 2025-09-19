@extends('layouts.base')

@section('content')
<div class="container my-auto mt-5">
    <div class="row signin-margin">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Reset Password</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="input-group input-group-outline mt-3 @if(old('email')) is-filled @endif">
                            <label class="form-label">Email</label>
                            <input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username">
                        </div>
                        @error('email')
                        <p class="text-danger inputerror">{{ $message }}</p>
                        @enderror

                        <!-- Password -->
                        <div class="input-group input-group-outline mt-3">
                            <label class="form-label">Password</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                        </div>
                        @error('password')
                        <p class="text-danger inputerror">{{ $message }}</p>
                        @enderror

                        <!-- Confirm Password -->
                        <div class="input-group input-group-outline mt-3">
                            <label class="form-label">Confirm Password</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        @error('password_confirmation')
                        <p class="text-danger inputerror">{{ $message }}</p>
                        @enderror

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
