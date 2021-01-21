@extends('user.layouts.auth')

@section('content')
<form method="POST" id="signup-form" class="signup-form" action="{{ route('register') }}">
    @csrf
    
    <h2>Sign up </h2>
    <div class="form-group">
        <input type="text" class="form-input" name="name" id="name" placeholder="Your Name"/>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input type="email" class="form-input" name="email" id="email" placeholder="Email"/>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>


    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="color: #2d2d2d">

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="submit-link submit" style="color: #2d2d2d">
                {{ __('register') }}
            </button> <br> <br>
        </div>

        <div class="col-md-6 offset-md-4">
            <a href="{{ route('login') }}" type="submit" class="submit-link submit" style="color: #2d2d2d">
                {{ __('login') }}
            </a> <br>
        </div>
    </div>
</form>

<a href="{{ url('/') }}">
    Welcome
</a>
@endsection
