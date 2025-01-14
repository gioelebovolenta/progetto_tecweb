<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifica Prodotto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('user.update-product', $product->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Materia</label>
                        <input type="text" name="title" id="title" value="{{ $product->title }}" class="border rounded px-4 py-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-gray-700">Facoltà</label>
                        <input type="text" name="subject" id="subject" value="{{ $product->subject }}" class="border rounded px-4 py-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Descrizione</label>
                        <textarea name="description" id="description" class="border rounded px-4 py-2 w-full" rows="6">{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">Prezzo</label>
                        <input type="number" name="price" id="price" value="{{ $product->price }}" step="0.01" min="0" class="border rounded px-4 py-2 w-full">
                    </div>
                    

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Aggiorna Prodotto
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
