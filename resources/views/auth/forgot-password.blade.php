@extends('partials.layout')
@section('title', __('Forgot Password'))
@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body space-y-4">
                <div class="space-y-2">
                    <p class="badge badge-secondary">{{ __('Reset access') }}</p>
                    <h1 class="card-title text-3xl">{{ __('Forgot your password?') }}</h1>
                    <p class="text-sm text-base-content/70">
                        {{ __('No problem. Enter your email and we will send you a link to reset your password securely.') }}
                    </p>
                </div>

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

                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                    @csrf

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">@lang('Email')</span>

                        </div>
                        <input type="email" name="email" class="input input-bordered w-full" value="{{ old('email') }}"
                            placeholder="@lang('Email')" required autofocus />
                        @error('email')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>

                    <div class="flex items-center justify-between flex-wrap gap-3 pt-2">
                        <a href="{{ route('login') }}" class="link link-primary">
                            {{ __('Back to login') }}
                        </a>
                        <button class="btn btn-primary">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
