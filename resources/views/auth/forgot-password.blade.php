@extends('layouts.base')

@section('content')
<div class="container my-auto mt-5">
    <div class="row signin-margin">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Forgot Password</h4>
                        <div class="row mt-3">
                            <h6 class='text-white text-center'>
                                Enter your email address and we'll send you a password reset link.
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ session('status') }}</span>
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="input-group input-group-outline mt-3 @if(old('email')) is-filled @endif">
                            <label class="form-label">Email</label>
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus>
                        </div>
                        @error('email')
                        <p class="text-danger inputerror">{{ $message }}</p>
                        @enderror

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
