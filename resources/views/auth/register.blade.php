@extends('layouts.auth')

@section('content')
<div class="relative min-h-screen bg-white sm:items-center py-4 sm:pt-0">

    <h1 class="register__title">Sign Up</h1>
    <div class="register__form mx-auto sm:px-6 lg:px-8 flex justify-center mt-4 sm:items-center sm:justify-between">
        <form method="POST" action="{{ route('register.user') }}">
            @csrf

            <div class="input__box">
                <input type="email" value="{{ old('email') }}" name="email" placeholder="Email"
                style="@error('email') border-color:#f97575; @enderror">
                @if($errors->has('email'))
                  <span style="color:#f93434;font-size:12px;">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="input__box mt-4">
                <input type="password" value="{{ old('email') }}" name="password" placeholder="Password"
                style="@error('password') border-color:#f97575; @enderror">
                @if($errors->has('password'))
                  <span style="color:#f93434;font-size:12px;">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button type="submit" class="submit__btn mt-8">Register</button>

            @auth
                <span></span>
            @else
            <p class="mt-4 text-center">
                Already have an Account <a href="/login" style="color:#6a6aff">Sign In</a>
            </p>
            @endauth

        </form>
    </div>
</div>

@endsection
