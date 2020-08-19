@php
    $invalidEmail = $errors->get('email') ? 'form-control is-invalid' : 'form-control';
@endphp
@extends('layout.main_auth')
@section('title', 'Reset Password')
@section('content')
<h4 class="fw-300 c-grey-900 mB-40">{{ __('Reset Password') }}</h4>
@include('layout.alert')
{!! Form::open(['route' => 'register']) !!}
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
        {!! Form::submit('Send Password Reset Link', ['class' => 'btn btn-primary']); !!}
    </div>
    @if (Route::has('login'))
        <a class="btn btn-link" href="{{ route('login') }}">
            {{ __('Already have an account?') }}
        </a>
    @endif
{!! Form::close() !!}
@endsection