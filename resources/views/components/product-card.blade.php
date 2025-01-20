@props(['product'])

<x-panel>
    <div class="d-flex flex-column flex-grow-1">
        <!-- Facoltà o materia -->
        <a href="#" class="text-muted small mb-2">
            {{ $product->subject }}
        </a>

        <!-- Titolo del prodotto -->
        <h3 class="fw-bold fs-4 mt-3 ms-4">
            <a href="{{ route('products.show', $product->id) }}" class="text-dark text-decoration-none hover-link">
                {{ $product->title }}
            </a>
        </h3>
        
        <!-- Pagine e prezzo -->
        <p class="text-muted small mt-auto ms-4">
            @if(!empty($product->pages))
                {{ $product->pages }} {{ $product->pages === 1 ? 'pagina' : 'pagine' }} - €{{ number_format($product->price, 2, ',', '.') }}
            @else
                <em>Numero di pagine non disponibile</em> - €{{ number_format($product->price, 2, ',', '.') }}
            @endif
        </p>
    </div>

    <!-- Tag con link dinamico al tipo -->
    <div>
        <x-tag href="{{ route('products.type', $product->type) }}">
            {{ ucfirst($product->type) }}
        </x-tag>
    </div>
</x-panel>
