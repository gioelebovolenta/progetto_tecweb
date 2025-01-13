<x-layout>
    <x-page-heading>{{ ucfirst($type) }}</x-page-heading>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @forelse ($products as $product)
            <x-product-card :product="$product" />
        @empty
            <p class="text-center col-span-full text-gray-500">Nessun prodotto trovato.</p>
        @endforelse
    </div>
</x-layout>
