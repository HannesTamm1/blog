@extends('partials.layout')
@section('title', __('Login'))
@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="grid md:grid-cols-2 gap-6">
            <div class="card bg-base-100 shadow-xl md:col-span-2">
                <div class="card-body space-y-4">
                    <div class="flex items-center gap-3">
                        <h1 class="card-title text-2xl md:text-3xl">{{ __('Sign in to continue') }}</h1>
                    </div>
                    <p class="text-sm text-base-content/70">
                        {{ __('Access your dashboard, manage content, and update your profile. Use the email and password you registered with.') }}
                    </p>

                    @if (session('status'))
                        <div role="alert" class="alert alert-success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('status') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div role="alert" class="alert alert-error">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ __('Please check your details and try again.') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-3">
                        @csrf

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">@lang('Email')</span>
                            </div>
                            <input type="email" name="email" class="input input-bordered w-full" value="{{ old('email') }}"
                                placeholder="@lang('Email')" required autofocus autocomplete="username" />
                            @error('email')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">@lang('Password')</span>
                            </div>
                            <input type="password" name="password" class="input input-bordered w-full"
                                placeholder="@lang('Password')" required autocomplete="current-password" />
                            @error('password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <div class="flex items-center justify-between flex-wrap gap-3 pt-1">
                            <label class="label cursor-pointer gap-3">
                                <input name="remember" type="checkbox" class="checkbox checkbox-primary" />
                                <span class="label-text">@lang('Remember me')</span>
                            </label>

                            <div class="flex items-center gap-3">
                                @if (Route::has('password.request'))
                                    <a class="link link-primary" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                                <button class="btn btn-primary">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
