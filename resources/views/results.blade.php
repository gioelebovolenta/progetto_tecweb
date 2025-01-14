<x-layout>
    <x-page-heading>Risultati ricerca</x-page-heading>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
        @foreach ($products as $product)
            <x-product-card :$product />
        @endforeach
    </div>
</x-layout>
