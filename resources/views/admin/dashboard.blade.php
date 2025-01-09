<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4 mb-6">
                <!-- Infobox Utenti -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700">Totale Utenti</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalUsers }}</p>
                </div>
                <!-- Infobox Prodotti -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700">Totale Prodotti</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalProducts }}</p>
                </div>
            </div>

            <!-- Pulsanti Gestione -->
            <div class="flex space-x-4">
                <a href="{{ route('admin.users.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Gestisci Utenti
                </a>
                <a href="{{ route('admin.products.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Gestisci Prodotti
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
