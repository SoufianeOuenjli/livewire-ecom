<x-layouts.app :title="__('Edit Client')">
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">{{ __('Edit Client') }}</h2>

        <!-- Client Edit Form -->
        <form method="POST" action="{{ route('clients.update', $client->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                <input type="text" name="nom" id="nom" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('nom', $client->nom) }}" required>
                @error('nom') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('email', $client->email) }}" required>
                @error('email') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="telephone" class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                <input type="text" name="telephone" id="telephone" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('telephone', $client->telephone) }}" required>
                @error('telephone') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="adresse" class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>
                <input type="text" name="adresse" id="adresse" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('adresse', $client->adresse) }}" required>
                @error('adresse') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    {{ __('Update Client') }}
                </button>
                <a href="{{ route('clients.index') }}" class="text-gray-500 hover:text-gray-700" wire:navigate>{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-layouts.app>
