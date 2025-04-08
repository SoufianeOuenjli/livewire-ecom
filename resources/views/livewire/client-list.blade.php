<div class="p-4">
    <h2 class="text-xl font-semibold mb-4">{{ __('Clients') }}</h2>
    <div class="flex justify-between items-center mb-4">
          <!-- Search Input -->
    <div class="">
        <input
            type="text"
            wire:model.live.debounce.500ms="search"
            placeholder="Chercher..."
            class="w-1/4 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white dark:border-gray-600"
        />
    </div>
        <a href="{{ route('clients.create') }}" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600" wire:navigate>
            <x-heroicon-o-plus class="w-6 h-6" />
        </a>
    </div>

    <table class="w-full border-collapse [--gutter:--spacing(6)] sm:[--gutter:--spacing(8)]">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">Nom</th>
                <th class="border px-4 py-2 text-left">Email</th>
                <th class="border px-4 py-2 text-left">Téléphone</th>
                <th class="border px-4 py-2 text-left">Adresse</th>
                <th class="border px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $client->nom }}</td>
                    <td class="border px-4 py-2">{{ $client->email }}</td>
                    <td class="border px-4 py-2">{{ $client->telephone }}</td>
                    <td class="border px-4 py-2">{{ $client->adresse }}</td>
                    <td class="border px-2 py-1">
                        <div class="flex space-x-2">
                            <a  href="{{ route('clients.edit', $client->id) }}" class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600" wire:navigate>
                                <x-heroicon-o-pencil class="w-3 h-3" />
                            </a>
                            <button wire:click="deleteClient({{ $client->id }})" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600">
                                <x-heroicon-o-trash class="w-3 h-3" />
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">
                        {{ __('Aucun client trouvé.') }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $clients->links() }}
    </div>
</div>
@script
<script>
    // Listen for 'swal:confirm' event to show SweetAlert confirmation dialog
    $wire.on('swal:confirm', (id) => {
        Swal.fire({
            title: '  tes-vous sur?',
            text: "Vous ne pourrez pas annuler cela!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimez-le!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, call Livewire to delete the client
                $wire.dispatch('clientDeleted', id);
            }
        });
    });

    // Listen for 'swal:success' to show success message after deletion
    Livewire.on('swal:success', (message) => {
        Swal.fire(
            'Deleted!',
            message,
            'success'
        );
    });
</script>
@endscript
