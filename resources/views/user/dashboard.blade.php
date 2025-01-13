<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Dashboard') }}
            </h2>
            <x-forms.button href="/products/create">Vendi materiale</x-forms.button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4 mb-6">
                <!-- Infobox: Prodotti in vendita -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700">Prodotti in vendita</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $productsForSale }}</p>
                </div>
                <!-- Infobox: Prodotti acquistati -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700">Prodotti acquistati</h3>
                    <p class="text-3xl font-bold text-gray-900">{{ $purchasedProducts }}</p>
                </div>
            </div>

            <!-- Pulsanti Gestione -->
            <div class="flex space-x-4">
                <a href="{{ route('user.manage-products') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Gestisci Materiale in Vendita
                </a>
                <a href="{{ route('user.purchased-products') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Materiale Acquistato
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
