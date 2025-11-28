@extends('partials.layout')
@section('title', __('Confirm Password'))
@section('content')
    <div class="max-w-xl mx-auto">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body space-y-4">
                <div class="space-y-2">
                    <p class="badge badge-primary">{{ __('Security check') }}</p>
                    <h1 class="card-title text-3xl">{{ __('Confirm your password') }}</h1>
                    <p class="text-sm text-base-content/70">
                        {{ __('This is a secure area. For your protection, please confirm your password before continuing.') }}
                    </p>
                </div>

                <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
                    @csrf

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

                    <div class="flex items-center justify-between">
                        <a href="{{ url()->previous() }}" class="link link-primary">
                            {{ __('Go back') }}
                        </a>
                        <button class="btn btn-primary">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
