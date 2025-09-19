@extends('layouts.base')

@section('content')
<div class="container my-auto mt-5">
    <div class="row signin-margin">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Confirm Password</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <!-- Password -->
                        <div class="input-group input-group-outline mt-3">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" />
                            @error('password')
                            <p class='text-danger inputerror'>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                                {{ __('Confirm') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
