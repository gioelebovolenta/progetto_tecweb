<x-layout>
    <div class="container my-5">
        <h1 class="fw-bold mb-4 text-center">{{ $product->title }} - {{ ucfirst($product->type) }}</h1>

        <div class="card mx-auto shadow-sm" style="max-width: 36rem;">
            <div class="card-body">
                <!-- Facoltà -->
                <div class="mb-4">
                    <h3 class="h5 fw-bold">Facoltà</h3>
                    <p class="text-muted">{{ $product->subject }}</p>
                </div>

                <!-- Descrizione -->
                <div class="mb-4">
                    <h3 class="h5 fw-bold">Descrizione</h3>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>

                <!-- Pagine e Prezzo -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="text-muted mb-0"><strong>Pagine:</strong> {{ $product->pages }}</p>
                    <p class="text-muted mb-0"><strong>Prezzo:</strong> €{{ number_format($product->price, 2, ',', '.') }}</p>
                </div>

                <!-- Acquista Button -->
                <button 
                    class="btn btn-primary w-100"
                    onclick="purchaseProduct('{{ route('products.download', $product->id) }}')">
                    Acquista
                </button>
            </div>
        </div>
    </div>

    <!-- Script per Pop-up e Download -->
    <script>
        function purchaseProduct(downloadUrl) {
            // Mostra il pop-up
            alert("Acquisto andato a buon fine!");

            // Avvia il download del file PDF
            window.location.href = downloadUrl;
        }
    </script>
</x-layout>
