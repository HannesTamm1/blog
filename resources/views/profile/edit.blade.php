@extends('partials.layout')
@section('title', __('Profile'))
@section('content')
    <div class="max-w-5xl mx-auto space-y-6">
        <div class="hero bg-base-200 rounded-box shadow-sm">
            <div class="hero-content flex-col lg:flex-row items-start gap-6">
                <div class="avatar placeholder">
                    <div class="w-16 rounded-full bg-primary text-primary-content">
                        <span class="text-xl font-semibold">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr(auth()->user()->name, 0, 2)) }}</span>
                    </div>
                </div>
                <div class="space-y-2">
                    <p class="badge badge-primary">{{ __('Your account') }}</p>
                    <h1 class="text-3xl font-bold">{{ __('Manage profile & security') }}</h1>
                    <p class="text-base-content/70">
                        {{ __('Update your details, change your password, or remove your account. Changes save instantly and keep your profile up to date.') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
