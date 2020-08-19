@php
    $invalidName = $errors->get('name') ? 'form-control is-invalid' : 'form-control';
    $invalidEmail = $errors->get('email') ? 'form-control is-invalid' : 'form-control';
    $invalidPassword = $errors->get('password') ? 'form-control is-invalid' : 'form-control';
@endphp
@extends('layout.main_auth')
@section('title', 'Register')
@section('content')
<h4 class="fw-300 c-grey-900 mB-40">{{ __('Register') }}</h4>
{!! Form::open(['route' => 'register']) !!}
    <div class="form-group">
        {!! Form::label('name', null, ['class' => 'text-normal text-dark']); !!}
        {!! Form::text('name', old('name'), ['class' => $invalidName, 'placeholder' => 'Name', 'autofocus' => true]) !!}
        @error ('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('email', null, ['class' => 'text-normal text-dark']); !!}
        {!! Form::email('email', old('email'), ['class' => $invalidEmail, 'placeholder' => 'Email']) !!}
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
        {!! Form::label('confirm_password', null, ['class' => 'text-normal text-dark']); !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
        @error ('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::submit('Register', ['class' => 'btn btn-primary']); !!}
    </div>
    @if (Route::has('login'))
        <a class="btn btn-link" href="{{ route('login') }}">
            {{ __('Already have an account?') }}
        </a>
    @endif
{!! Form::close() !!}
@endsection