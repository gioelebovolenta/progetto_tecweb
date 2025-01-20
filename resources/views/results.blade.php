<x-layout>
    <div class="container my-5">
        <h1 class="fw-bold mb-4 text-center">Risultati ricerca</h1>

        <div class="row g-4">
            @foreach ($products as $product)
                <div class="col-12 col-md-6 col-lg-4">
                    <x-product-card :$product />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
