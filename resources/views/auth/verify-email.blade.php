@extends('partials.layout')
@section('title', __('Verify Email'))
@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="hero bg-base-200 rounded-box shadow-sm p-6 mb-4">
            <div class="hero-content flex-col items-start gap-4">
                <div class="avatar placeholder">
                    <div class="bg-primary text-primary-content rounded-full w-16">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            class="w-8 h-8 mx-auto">
                            <path d="M4 6.5 12 12l8-5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <rect x="4" y="6.5" width="16" height="11" rx="2" ry="2" stroke="currentColor"
                                stroke-width="1.5" />
                        </svg>
                    </div>
                </div>
                <div class="space-y-2">
                    <p class="badge badge-primary">{{ __('Action Required') }}</p>
                    <h1 class="text-3xl font-bold">{{ __('Verify your email address') }}</h1>
                    <p class="text-base-content/70">
                        {{ __('We sent a verification link to your inbox. Click the link to activate your account. If the email went missing, you can send another one below.') }}
                    </p>
                </div>
            </div>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div role="alert" class="alert alert-success mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ __('A new verification link is on its way to you.') }}</span>
            </div>
        @endif

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body gap-4">
                <div class="space-y-1">
                    <h2 class="card-title">{{ __('Did not get the email?') }}</h2>
                    <p class="text-sm text-base-content/70">
                        {{ __('Check your spam folder or request a fresh link. You can also log out and try a different address.') }}
                    </p>
                </div>
                <div class="card-actions justify-between items-center flex-wrap gap-3">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button class="btn btn-primary">
                            {{ __('Resend verification email') }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline">
                            {{ __('Log out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
