<x-layouts.app :title="__('Add Client')">
    <div class="max-w-2xl mx-auto bg-white p-6 dark:bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">{{ __('Add New Client') }}</h2>

        <!-- Client Create Form -->
        <form method="POST" action="{{ route('clients.store') }}">
            @csrf
            <div class="mb-4">
                <label for="nom" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                <input type="text" name="nom" id="nom" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('nom') }}" required>
                @error('nom') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('email') }}" required>
                @error('email') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="telephone" class="block text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                <input type="text" name="telephone" id="telephone" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('telephone') }}" required>
                @error('telephone') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="adresse" class="block text-sm font-medium text-gray-700">{{ __('Address') }}</label>
                <input type="text" name="adresse" id="adresse" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('adresse') }}" required>
                @error('adresse') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                    {{ __('Save Client') }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
