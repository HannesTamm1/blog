@extends('partials.layout')
@section('title', __('Register'))
@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="grid lg:grid-cols-3 gap-6">
            <div class="card bg-base-100 shadow-xl lg:col-span-2">
                <div class="card-body space-y-4">
                    <div class="space-y-2">
                        <p class="badge badge-primary">{{ __('Welcome') }}</p>
                        <h1 class="card-title text-3xl">{{ __('Create your account') }}</h1>
                        <p class="text-sm text-base-content/70">
                            {{ __('A quick form to get you started. Use a strong password and the email you want for notifications.') }}
                        </p>
                    </div>

                    @if ($errors->any())
                        <div role="alert" class="alert alert-error">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ __('Please fix the highlighted fields and try again.') }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" class="space-y-3">
                        @csrf

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">@lang('Name')</span>
                            </div>
                            <input type="text" name="name" class="input input-bordered w-full" value="{{ old('name') }}"
                                placeholder="@lang('Name')" required autofocus autocomplete="name" />
                            @error('name')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">@lang('Email')</span>
                            </div>
                            <input type="email" name="email" class="input input-bordered w-full" value="{{ old('email') }}"
                                placeholder="@lang('Email')" required autocomplete="username" />
                            @error('email')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">@lang('Password')</span>
                            </div>
                            <input type="password" name="password" class="input input-bordered w-full"
                                placeholder="@lang('Password')" required autocomplete="new-password" />
                            @error('password')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">@lang('Confirm Password')</span>
                            </div>
                            <input type="password" name="password_confirmation" class="input input-bordered w-full"
                                placeholder="@lang('Confirm Password')" required autocomplete="new-password" />
                            @error('password_confirmation')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <div class="flex items-center justify-between pt-2">
                            <a class="link link-primary" href="{{ route('login') }}">
                                {{ __('Already registered? Log in') }}
                            </a>
                            <button class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card bg-base-200 shadow-inner">
                <div class="card-body space-y-3">
                    <h2 class="card-title text-xl">{{ __('Quick tips') }}</h2>
                    <ul class="space-y-2 text-sm text-base-content/80">
                        <li class="flex gap-2 items-start">
                            <span class="badge badge-primary badge-sm mt-1"></span>
                            <span>{{ __('Use an email you check often so you never miss account alerts.') }}</span>
                        </li>
                        <li class="flex gap-2 items-start">
                            <span class="badge badge-primary badge-sm mt-1"></span>
                            <span>{{ __('Create a unique password and keep it somewhere safe.') }}</span>
                        </li>
                        <li class="flex gap-2 items-start">
                            <span class="badge badge-primary badge-sm mt-1"></span>
                            <span>{{ __('You can update your profile details anytime after signing in.') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
