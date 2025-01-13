<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestisci Prodotti') }}
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
            <form method="GET" action="{{ route('admin.products.index') }}" class="mb-6">
                <input type="text" name="query" placeholder="Cerca prodotti" class="border rounded px-4 py-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cerca</button>
            </form>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-sm font-semibold text-gray-600 text-left">
                                Titolo
                            </th>
                            <th class="px-6 py-3 text-sm font-semibold text-gray-600 text-left">
                                Descrizione
                            </th>
                            <th class="px-6 py-3 text-sm font-semibold text-gray-600 text-left">
                                Azione
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4">{{ $product->title }}</td>
                            <td class="px-6 py-4">{{ $product->description }}</td>
                            <td class="px-6 py-4">
                                <form method="POST" action="{{ route('admin.products.delete', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Elimina</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
