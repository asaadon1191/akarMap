@extends('user.layouts.auth')

@section('content')
<form method="POST" id="signup-form" class="signup-form" action="{{ route('login') }}">
    @csrf
    
    <h2>Sign IN </h2>
    <div class="form-group">
        <input type="text" class="form-input" name="email" id="email" placeholder="Your Email"/>
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
                {{ __('Login') }}
            </button> <br> <br>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>

        <div class="col-md-6 offset-md-4">
            <a href="{{ route('register') }}" type="submit" class="submit-link submit" style="color: #2d2d2d">
                {{ __('register') }}
            </a> <br> <br>
        </div>
    </div>
</form>

<a href="{{ url('/') }}">
    Welcome
</a>
@endsection