@extends('auth.default')

@section('title', 'Confirm Password')

@section('content')
<div class="content-body">
    <section class="row flexbox-container">
        <div class="col-xl-8 col-11 d-flex justify-content-center">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                        <img src="{{asset('all/app-assets/images/pages/login.png')}}" alt="branding logo">
                    </div>
                    <div class="col-lg-6 col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">{{ __('Please confirm your password before continuing.') }}</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <form action="{{ route('password.confirm') }}" method="POST">
                                        @csrf

                                        <fieldset class="form-label-group position-relative has-icon-left">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="user-password" placeholder="Password" required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                            <div class="form-control-position">
                                                <i class="feather icon-lock"></i>
                                            </div>
                                            <label for="user-password">{{ __('Password') }}</label>
                                        </fieldset>
                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <div class="text-left">
                                                <fieldset class="checkbox">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox"  name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                        <span class="">{{ __('Remember Me') }}</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            @if (Route::has('password.request'))
                                                <div class="text-right"><a href="{{ route('password.request') }}" class="card-link">{{ __('Forgot Your Password?') }}</a></div>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right btn-inline">{{ __('Confirm Password') }}</button>
                                    </form>
                                </div>
                            </div>
                            <div class="login-footer">
                                <div class="divider">
                                    <div class="divider-text">{{ __('Advance POS') }}</div>
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
