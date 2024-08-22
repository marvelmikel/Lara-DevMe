@extends('auth::layouts.auth')
@section('content')
    {{-- <p>Module: {!! config('auth.name') !!}</p> --}}
    <!-- Session Status -->


    <div class="relative flex flex-col justify-center min-h-screen overflow-hidden">
        <div
            class="w-full  m-auto bg-white dark:bg-slate-800/60 rounded shadow-lg ring-2 ring-slate-300/50 dark:ring-slate-700/50 lg:max-w-md">
            <div class="text-center p-6 bg-slate-900 rounded-t">
                <a href='index.html'><img src="assets/images/logo-sm.png" alt="" class="w-14 h-14 mx-auto mb-2"></a>
                <h3 class="font-semibold text-white text-xl mb-1">Let's Get Started Robotech</h3>
                <p class="text-xs text-slate-400">Sign in to continue to Robotech.</p>
            </div>
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form class="p-6" method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />


                </div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-xs font-medium text-brand-500 underline ">  {{ __('Forgot your password?') }}</a>
                @endif
                <div class="block mt-3">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="mt-4">
                    <button
                        class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
                        Login
                    </button>
                </div>
            </form>
            <p class="mb-5 text-sm font-medium text-center text-slate-500"> Don't have an account? 
                @if (Route::has('register'))
                   
                <a href="{{ route('register') }}"
                    class='font-medium text-brand-500 hover:underline' href='auth-register.html'>Sign up</a>
                @endif
            </p>
        </div>
    </div>
@endsection
