<section class="space-y-4">
    <div class="space-y-1">
        <p class="badge badge-primary">{{ __('Profile') }}</p>
        <h2 class="text-xl font-semibold text-base-content">{{ __('Profile Information') }}</h2>
        <p class="text-sm text-base-content/70">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">@lang('Name')</span>
                <span class="label-text-alt text-base-content/60">@lang('This will appear on your profile')</span>
            </div>
            <input type="text" name="name" class="input input-bordered w-full" value="{{ old('name', $user->name) }}"
                placeholder="@lang('Name')" required autofocus autocomplete="name" />
            @error('name')
                <span class="label-text-alt text-error">{{ $message }}</span>
            @enderror
        </label>

        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">@lang('Email')</span>
                <span class="label-text-alt text-base-content/60">@lang('Used for account alerts and sign-in')</span>
            </div>
            <input type="email" name="email" class="input input-bordered w-full" value="{{ old('email', $user->email) }}"
                placeholder="@lang('Email')" required autocomplete="username" />
            @error('email')
                <span class="label-text-alt text-error">{{ $message }}</span>
            @enderror
        </label>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div class="alert alert-warning">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.01" />
                </svg>
                <div class="flex flex-col">
                    <span>{{ __('Your email address is unverified.') }}</span>
                    <button form="send-verification" class="link link-primary text-sm">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                    @if (session('status') === 'verification-link-sent')
                        <span class="text-sm text-success mt-1">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </span>
                    @endif
                </div>
            </div>
        @endif

        <div class="flex items-center gap-4 pt-2">
            <button class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-base-content">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
