<x-layout>
    <x-page-heading>{{ $product->title }} - {{ ucfirst($product->type) }}</x-page-heading>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md space-y-6">
        <!-- Facoltà -->
        <div>
            <h3 class="text-lg font-bold">Facoltà</h3>
            <p class="text-gray-600">{{ $product->subject }}</p>
        </div>

        <!-- Descrizione -->
        <div>
            <h3 class="text-lg font-bold">Descrizione</h3>
            <p class="text-gray-600">{{ $product->description }}</p>
        </div>

        <!-- Pagine e Prezzo -->
        <div class="flex justify-between items-center">
            <p class="text-gray-600"><strong>Pagine:</strong> {{ $product->pages }}</p>
            <p class="text-gray-600"><strong>Prezzo:</strong> €{{ number_format($product->price, 2, ',', '.') }}</p>
        </div>

        <!-- Acquista Button -->
        <x-forms.button
            class="w-full"
            onclick="purchaseProduct('{{ route('products.download', $product->id) }}')">
            Acquista
        </x-forms.button>
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
