<section class="space-y-4">
    <div class="space-y-1">
        <p class="badge badge-secondary">{{ __('Security') }}</p>
        <h2 class="text-xl font-semibold text-base-content">{{ __('Update Password') }}</h2>
        <p class="text-sm text-base-content/70">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">@lang('Current Password')</span>
                <span class="label-text-alt text-base-content/60">@lang('Enter your existing password')</span>
            </div>
            <input id="update_password_current_password" name="current_password" type="password"
                class="input input-bordered w-full" autocomplete="current-password" />
            @if ($errors->updatePassword->has('current_password'))
                <span class="label-text-alt text-error">{{ $errors->updatePassword->first('current_password') }}</span>
            @endif
        </label>

        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">@lang('New Password')</span>
                <span class="label-text-alt text-base-content/60">@lang('Use at least 8 characters')</span>
            </div>
            <input id="update_password_password" name="password" type="password" class="input input-bordered w-full"
                autocomplete="new-password" />
            @if ($errors->updatePassword->has('password'))
                <span class="label-text-alt text-error">{{ $errors->updatePassword->first('password') }}</span>
            @endif
        </label>

        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">@lang('Confirm Password')</span>
                <span class="label-text-alt text-base-content/60">@lang('Repeat the new password')</span>
            </div>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="input input-bordered w-full" autocomplete="new-password" />
            @if ($errors->updatePassword->has('password_confirmation'))
                <span class="label-text-alt text-error">{{ $errors->updatePassword->first('password_confirmation') }}</span>
            @endif
        </label>

        <div class="flex items-center gap-4 pt-2">
            <button class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-base-content">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
