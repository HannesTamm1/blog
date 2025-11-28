<section class="space-y-4">
    <div class="space-y-1">
        <p class="badge badge-error">{{ __('Danger zone') }}</p>
        <h2 class="text-xl font-semibold text-base-content">{{ __('Delete Account') }}</h2>
        <p class="text-sm text-base-content/70">
            {{ __('Once your account is deleted, all of its resources and data will be permanently removed. Download anything you want to keep before proceeding.') }}
        </p>
    </div>

    <button class="btn btn-error" onclick="document.getElementById('delete-account-modal').showModal()">
        {{ __('Delete Account') }}
    </button>

    <dialog id="delete-account-modal" class="modal">
        <div class="modal-box space-y-4">
            <div class="space-y-2">
                <h3 class="font-bold text-lg">{{ __('Are you sure you want to delete your account?') }}</h3>
                <p class="text-sm text-base-content/70">
                    {{ __('This action is permanent. Please enter your password to confirm deletion.') }}
                </p>
            </div>

            <form id="delete-account" method="post" action="{{ route('profile.destroy') }}" class="space-y-3">
                @csrf
                @method('delete')

                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">@lang('Password')</span>
                        <span class="label-text-alt text-base-content/60">@lang('Confirm to proceed')</span>
                    </div>
                    <input type="password" name="password" class="input input-bordered w-full"
                        placeholder="@lang('Password')" required autocomplete="current-password" />
                    @error('password')
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    @enderror
                </label>
            </form>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">{{ __('Cancel') }}</button>
                </form>
                <button class="btn btn-error" type="submit" form="delete-account">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </div>
    </dialog>
</section>
