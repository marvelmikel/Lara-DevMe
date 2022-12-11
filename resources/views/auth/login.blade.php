@extends('layouts.auth')

@section('content')
<div class="relative min-h-screen bg-white sm:items-center py-4 sm:pt-0">

    <h1 class="register__title">Sign In</h1>
    <div class="register__form mx-auto sm:px-6 lg:px-8 flex justify-center mt-4 sm:items-center sm:justify-between">
        <form method="POST" action="{{ route('login.user') }}">
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

            <button type="submit" class="submit__btn mt-8">Login</button>

            <p class="mt-4 text-center">
                or <a href="/register" style="color:#6a6aff">Sign up here</a>
            </p>
        </form>
    </div>
</div>

@endsection
