@php
    $invalidEmail = $errors->get('email') ? 'form-control is-invalid' : 'form-control';
    $invalidPassword = $errors->get('password') ? 'form-control is-invalid' : 'form-control';
@endphp
@extends('layout.main_auth')
@section('title', 'Login')
@section('content')
<h4 class="fw-300 c-grey-900 mB-40">Login</h4>
{!! Form::open(['route' => 'login']) !!}
    <div class="form-group">
        {!! Form::label('email', null, ['class' => 'text-normal text-dark']); !!}
        {!! Form::email('email', old('email'), ['class' => $invalidEmail, 'placeholder' => 'Email', 'autofocus' => true]) !!}
        @error ('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('password', null, ['class' => 'text-normal text-dark']); !!}
        {!! Form::password('password', ['class' => $invalidPassword, 'placeholder' => 'Password']) !!}
        @error ('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <div class="peers ai-c jc-sb fxw-nw">
            <div class="peer">
                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                    {!! Form::checkbox('remember', 1, old('remember') ? true : true); !!}
                    <label for="inputCall1" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">{{ __('Remember Me') }}</span></label>
                </div>
            </div>
            <div class="peer">
                {!! Form::submit('Login', ['class' => 'btn btn-primary']); !!}
            </div>
        </div>
    </div>
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
    <br>
    @if (Route::has('register'))
        <a class="btn btn-link" href="{{ route('register') }}">
            {{ __('Don\'t have an account? Register Now') }}
        </a>
    @endif
{!! Form::close() !!}
@endsection