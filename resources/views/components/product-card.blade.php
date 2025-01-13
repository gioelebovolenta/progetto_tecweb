@props(['product'])

<x-panel>
    <div class="flex-1 flex flex-col">
        <!-- Facoltà o materia -->
        <a class="self-start text-sm text-gray-400 transition-colors duration-300">
            {{ $product->subject }}
        </a>

        <!-- Titolo del prodotto -->
        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-600 transition-colors duration-300 ml-28">
            <a href="{{ route('products.show', $product->id) }}">
                {{ $product->title }}
            </a>
        </h3>
        
        <!-- Pagine e prezzo -->
        <p class="text-sm text-gray-400 mt-auto ml-28">
            {{ $product->pages }} pagine - €{{ $product->price }}
        </p>
    </div>

    <!-- Tag con link dinamico al tipo -->
    <div>
        <x-tag href="{{ route('products.type', $product->type) }}">
            {{ ucfirst($product->type) }}
        </x-tag>
    </div>
</x-panel>
