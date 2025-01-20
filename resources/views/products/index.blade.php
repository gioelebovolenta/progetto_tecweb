<x-layout>
    <div class="container-fluid d-flex justify-content-between align-items-center py-5 px-4">
        <!-- Immagine a sinistra -->
        <div class="col-2">
            <img src="{{ Vite::asset('resources/images/guys_studying.png') }}" alt="guys_studying" class="img-fluid">
        </div>

        <!-- Testo e Form al centro -->
        <div class="text-center flex-grow-1">
            <h1 class="fw-bold display-4 mb-4">Che cosa studi oggi?</h1>

            <form action="/search" method="GET" class="mt-4">
                <div class="input-group mx-auto" style="max-width: 600px;">
                    <input 
                        type="text" 
                        name="q" 
                        placeholder="Cerca materiale" 
                        class="form-control rounded-pill px-4 py-3 shadow-sm"
                    >
                </div>
            </form>
        </div>

        <!-- Immagine a destra -->
        <div class="col-2">
            <img src="{{ Vite::asset('resources/images/books2.png') }}" alt="Book" class="img-fluid">
        </div>
    </div>
</x-layout>
