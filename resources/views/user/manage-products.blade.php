<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestisci Materiale in Vendita') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            {{ session('error') }}
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Titolo</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Prezzo</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Azione</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $product->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ number_format($product->price, 2, '.', '') }} €</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('user.edit-product', $product->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                                    Modifica
                                </a>
                                <form method="POST" action="{{ route('user.delete-product', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">
                                        Elimina
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
