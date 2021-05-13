@extends('auth.default')

@section('title', 'Reset Password')

@section('content')
    <div class="content-body">
        <section class="row flexbox-container">
            <div class="col-xl-7 col-10 d-flex justify-content-center">
                <div class="card bg-authentication rounded-0 mb-0 w-100">
                    <div class="row m-0">
                        <div class="col-lg-6 d-lg-block d-none text-center align-self-center p-0">
                            <img src="{{ asset('all/app-assets/images/pages/reset-password.png')}}" alt="branding logo">
                        </div>
                        <div class="col-lg-6 col-12 p-0">
                            <div class="card rounded-0 mb-0 px-2">
                                <div class="card-header pb-1">
                                    <div class="card-title">
                                        <h4 class="mb-0">{{ __('Reset Password') }}</h4>
                                    </div>
                                </div>
                                <p class="px-2">{{ __('Please enter your new password.') }}</p>
                                <div class="card-content">
                                    <div class="card-body pt-1">
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf

                                            <input type="hidden" name="token" value="{{ $token }}">

                                            <fieldset class="form-label-group">
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="user-email" placeholder="Email" required>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <label for="user-email">{{ __('E-Mail') }}</label>
                                            </fieldset>

                                            <fieldset class="form-label-group">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="user-password" placeholder="Password" required>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <label for="user-password">{{ __('Password') }}</label>
                                            </fieldset>

                                            <fieldset class="form-label-group">
                                                <input type="password" class="form-control" name="password_confirmation" id="user-confirm-password" placeholder="Confirm Password" required>
                                                <label for="user-confirm-password">{{ __('Confirm Password') }}</label>
                                            </fieldset>
                                            <div class="row pt-2">
                                                <div class="col-12 col-md-6 mb-1">
                                                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-block px-0">Go Back to Login</a>
                                                </div>
                                                <div class="col-12 col-md-6 mb-1">
                                                    <button type="submit" class="btn btn-primary btn-block px-0">{{ __('Reset Password') }}</button>
                                                </div>
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
    </div>
@endsection
