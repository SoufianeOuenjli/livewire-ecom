<div class="p-4">
    <h2 class="text-xl font-semibold mb-4">{{ __('Fournisseurs') }}</h2>
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
        <a class="bg-blue-500 text-white p-2 rounded-lg hover:bg-yellow-600" href="{{ route('fournisseurs.create') }}"  wire:navigate>
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
            @forelse ($fournisseurs as $fournisseur)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $fournisseur->nom }}</td>
                    <td class="border px-4 py-2">{{ $fournisseur->email }}</td>
                    <td class="border px-4 py-2">{{ $fournisseur->telephone }}</td>
                    <td class="border px-4 py-2">{{ $fournisseur->adresse }}</td>
                    <td class="border px-2 py-1">
                        <div class="flex space-x-2">
                            <a  href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="bg-yellow-500 text-white p-2 rounded-lg inline-block hover:bg-blue-600" wire:navigate>
                                <x-heroicon-o-pencil class="w-3 h-3" />
                            </a>
                            <button wire:click="deleteFournisseur({{ $fournisseur->id }})" class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 cursor-pointer">
                                <x-heroicon-o-trash class="w-3 h-3" />
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">
                        {{ __('Aucun fournisseur trouvé.') }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $fournisseurs->links() }}
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
                // If confirmed, call Livewire to delete the fournisseur
                $wire.dispatch('fournisseurDeleted', id);
            }
        });
    });

    // Listen for 'swal:success' to show success message after deletion
    Livewire.on('swal:success', (event) => {
        const type = event[0].type;
        const message = event[0].message;
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
        Toast.fire({
        icon: type,
        title: message
        });

    });
</script>
@endscript
