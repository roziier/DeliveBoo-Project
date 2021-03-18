@extends('layouts.app')

@section('content')
<div class="register__box">
    <div class="register__box--top">
        <h4>Login</h4>
    </div>
    <div class="register__box--form">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right"><h2>Email</h2></label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> 
                    @enderror
                </div>
            </div>

            <div class="form-group row d-flex align-items-center">
                <label for="password" class="col-md-4 col-form-label text-md-right"><h2>Password</h2></label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary" id="loginn">
                        {{ __('Accedi') }}
                    </button>

                </div>
            </div> 
        </form>
    </div>
</div>
@endsection
