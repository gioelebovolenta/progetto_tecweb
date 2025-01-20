<x-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row mb-4">
            <!-- Infobox Utenti -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 fw-bold text-secondary">Totale Utenti</h3>
                        <p class="fs-3 fw-bold text-dark">{{ $totalUsers }}</p>
                    </div>
                </div>
            </div>

            <!-- Infobox Prodotti -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="h6 fw-bold text-secondary">Totale Prodotti</h3>
                        <p class="fs-3 fw-bold text-dark">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pulsanti Gestione -->
        <div class="d-flex justify-content-start gap-3">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Gestisci Utenti</a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-success">Gestisci Prodotti</a>
        </div>
    </div>
</x-layout>
