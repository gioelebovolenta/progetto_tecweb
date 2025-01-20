<x-layout>
    <div class="container my-5">
        <h1 class="fw-bold text-capitalize mb-4">{{ ucfirst($type) }}</h1>

        <div class="row g-4">
            @forelse ($products as $product)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-product-card :product="$product" />
                </div>
            @empty
                <p class="text-center text-muted">Nessun prodotto trovato.</p>
            @endforelse
        </div>
    </div>
</x-layout>
