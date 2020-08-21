@php
    $invalidEmail = $errors->get('email') ? 'form-control is-invalid' : 'form-control';
    $invalidPassword = $errors->get('password') ? 'form-control is-invalid' : 'form-control';
@endphp
@extends('layout.main_auth')
@section('title', 'Confirm Password')
@section('content')
<h4 class="fw-300 c-grey-900 mB-40">{{ __('Please confirm your password before continuing.') }}</h4>
{!! Form::open(['route' => 'password.confirm']) !!}
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
        {!! Form::submit('Confirm Password', ['class' => 'btn btn-primary']); !!}
    </div>
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
{!! Form::close() !!}
@endsection