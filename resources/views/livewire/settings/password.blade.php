<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Update password')">
        <form wire:submit="updatePassword" class="mt-4">
            <!-- Current Password -->
            <div class="mb-3">
                <label class="form-label">{{ __('Current password') }}</label>
                <input type="password" class="form-control"
                       wire:model="current_password"
                       required
                       autocomplete="current-password">
            </div>

            <!-- New Password -->
            <div class="mb-3">
                <label class="form-label">{{ __('New password') }}</label>
                <input type="password" class="form-control"
                       wire:model="password"
                       required
                       autocomplete="new-password">
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label class="form-label">{{ __('Confirm Password') }}</label>
                <input type="password" class="form-control"
                       wire:model="password_confirmation"
                       required
                       autocomplete="new-password">
            </div>

            <!-- Save Button & Message -->
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save') }}
                    </button>

                    <x-action-message class="text-success mb-0" on="password-updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </div>
        </form>
    </x-settings.layout>
</section>
