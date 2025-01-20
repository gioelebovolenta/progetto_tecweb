<x-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-bold text-dark">
                {{ __('User Dashboard') }}
            </h2>
            <a href="/products/create" class="btn btn-primary">
                Vendi materiale
            </a>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <!-- Infoboxes -->
            <div class="row mb-4">
                <!-- Prodotti in vendita -->
                <div class="col-12 col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="h6 fw-bold text-secondary">Prodotti in vendita</h3>
                            <p class="fs-3 fw-bold text-dark">{{ $productsForSale }}</p>
                        </div>
                    </div>
                </div>

                <!-- Prodotti acquistati -->
                <div class="col-12 col-md-6 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="h6 fw-bold text-secondary">Prodotti acquistati</h3>
                            <p class="fs-3 fw-bold text-dark">{{ $purchasedProducts }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pulsanti Gestione -->
            <div class="d-flex gap-3">
                <a href="{{ route('user.manage-products') }}" class="btn btn-primary">
                    Gestisci Materiale in Vendita
                </a>
                <a href="{{ route('user.purchased-products') }}" class="btn btn-success">
                    Materiale Acquistato
                </a>
            </div>
        </div>
    </div>
</x-layout>
