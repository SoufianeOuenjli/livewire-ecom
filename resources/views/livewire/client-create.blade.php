<div class="max-w-2xl mx-auto bg-white p-6 dark:bg-gray-800 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">{{ __('Ajouter un Nouveau Client') }}</h2>

    <!-- Formulaire de Création de Client -->
    <form wire:submit.prevent="submit">
        <div class="mb-4">
        <label for="nom" class="block text-sm font-medium text-gray-700">{{ __('Nom') }}</label>
        <input type="text" wire:model.defer="nom" id="nom" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        @error('nom') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
        <label for="prenom" class="block text-sm font-medium text-gray-700">{{ __('Prenom') }}</label>
        <input type="text" wire:model.defer="prenom" id="prenom" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        @error('prenom') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
        <input type="email" wire:model.defer="email" id="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        @error('email') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
        <label for="telephone" class="block text-sm font-medium text-gray-700">{{ __('Téléphone') }}</label>
        <input type="text" wire:model.defer="telephone" id="telephone" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        @error('telephone') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
        <label for="ville" class="block text-sm font-medium text-gray-700">{{ __('Ville') }}</label>
        <input type="text" wire:model.defer="ville" id="ville" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        @error('ville') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
        <label for="adresse" class="block text-sm font-medium text-gray-700">{{ __('Adresse') }}</label>
        <input type="text" wire:model.defer="adresse" id="adresse" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        @error('adresse') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
            {{ __('Enregistrer le Client') }}
        </button>
        </div>
    </form>
</div>
