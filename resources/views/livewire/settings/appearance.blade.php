<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout >
        <div class="btn-group" role="group" x-data x-model="$flux.appearance">
            <!-- Hidden radio inputs -->
            <input type="radio" class="btn-check" name="appearance"
                   id="appearance-light" value="light" x-model="$flux.appearance">
            <input type="radio" class="btn-check" name="appearance"
                   id="appearance-dark" value="dark" x-model="$flux.appearance">
            <input type="radio" class="btn-check" name="appearance"
                   id="appearance-system" value="system" x-model="$flux.appearance">

            <!-- Visible buttons -->
            <label class="btn btn-outline-secondary" for="appearance-light"
                   :class="{ 'active': $flux.appearance === 'light' }">
                <i class="bi bi-sun me-2"></i>
                {{ __('Light') }}
            </label>

            <label class="btn btn-outline-secondary" for="appearance-dark"
                   :class="{ 'active': $flux.appearance === 'dark' }">
                <i class="bi bi-moon me-2"></i>
                {{ __('Dark') }}
            </label>

            <label class="btn btn-outline-secondary" for="appearance-system"
                   :class="{ 'class': $flux.appearance === 'system' }">
                <i class="bi bi-display me-2"></i>
                {{ __('System') }}
            </label>
        </div>


    </x-settings.layout>
</section>
