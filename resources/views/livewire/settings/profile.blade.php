<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id)
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', value: 'verification-link-sent');
    }
}; ?>

<div class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout>
        <div class="card">
            <div class="card-body">
                <form wire:submit="updateProfileInformation" class="mb-4">
                    <!-- Name Input -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" wire:model="name" required autofocus autocomplete="name">
                    </div>

                    <!-- Email Input -->
                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }}</label>
                        <input type="email" class="form-control" wire:model="email" required autocomplete="email">

                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                            <div class="alert alert-warning mt-3">
                                <p class="mb-1">{{ __('Your email address is unverified.') }}</p>
                                <a href="#" class="alert-link" wire:click.prevent="resendVerificationNotification">
                                    {{ __('Click here to re-send the verification email.') }}
                                </a>

                                @if (session('status') === 'verification-link-sent')
                                    <div class="alert alert-success mt-2 mb-0">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Save Button -->
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>

                            <x-action-message class="text-success mb-0" on="profile-updated">
                                {{ __('Saved.') }}
                            </x-action-message>
                        </div>
                    </div>
                </form>

                <!-- Delete User Form -->
                <livewire:settings.delete-user-form />
            </div>
        </div>
    </x-settings.layout>
</section>
