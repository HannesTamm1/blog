@extends('partials.layout')
@section('title', __('Reset Password'))
@section('content')
    <div class="max-w-xl mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body space-y-4">
                <div class="space-y-2">
                    <p class="badge badge-secondary">{{ __('Security first') }}</p>
                    <h1 class="card-title text-3xl">{{ __('Set a new password') }}</h1>
                    <p class="text-sm text-base-content/70">
                        {{ __('Use a strong, unique password to keep your account safe. You can reset it below using the link we sent to your email.') }}
                    </p>
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">@lang('Email')</span>
                            <span class="label-text-alt text-base-content/60">@lang('Where we sent the reset link')</span>
                        </div>
                        <input type="email" name="email" value="{{ old('email', $request->email) }}"
                            class="input input-bordered w-full" required autofocus autocomplete="username" />
                        @error('email')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">@lang('Password')</span>
                            <span class="label-text-alt text-base-content/60">@lang('At least 8 characters')</span>
                        </div>
                        <input type="password" name="password" class="input input-bordered w-full" required
                            autocomplete="new-password" />
                        @error('password')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">@lang('Confirm Password')</span>
                            <span class="label-text-alt text-base-content/60">@lang('Make sure it matches')</span>
                        </div>
                        <input type="password" name="password_confirmation" class="input input-bordered w-full" required
                            autocomplete="new-password" />
                        @error('password_confirmation')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>

                    <div class="flex items-center justify-between pt-2">
                        <a href="{{ route('login') }}" class="link link-primary">
                            {{ __('Back to login') }}
                        </a>
                        <button class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
