<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materiale Acquistato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-bold text-gray-700">Titolo</th>
                            <th class="px-6 py-3"></th> <!-- Aggiunto per mantenere il layout -->
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($purchasedProducts as $product)
                        <tr>
                            <td class="px-6 py-4 text-lg text-gray-800">{{ $product->title }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('products.download', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Scarica
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
