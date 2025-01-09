<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestisci Prodotti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('admin.products.index') }}" class="mb-6">
                <input type="text" name="query" placeholder="Cerca prodotti" class="border rounded px-4 py-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cerca</button>
            </form>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-6 py-3">Titolo</th>
                            <th class="px-6 py-3">Descrizione</th>
                            <th class="px-6 py-3">Azione</th>
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
