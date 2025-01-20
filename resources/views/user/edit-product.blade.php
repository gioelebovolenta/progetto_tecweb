<x-layout>
    <x-slot name="header">
        <h2 class="h4 fw-bold text-dark">
            {{ __('Modifica Prodotto') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update-product', $product->id) }}">
                        @csrf
                        @method('PATCH')

                        <!-- Materia -->
                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">{{ __('Materia') }}</label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                value="{{ $product->title }}" 
                                class="form-control" 
                                required>
                        </div>

                        <!-- Facoltà -->
                        <div class="mb-3">
                            <label for="subject" class="form-label fw-bold">{{ __('Facoltà') }}</label>
                            <input 
                                type="text" 
                                name="subject" 
                                id="subject" 
                                value="{{ $product->subject }}" 
                                class="form-control" 
                                required>
                        </div>

                        <!-- Descrizione -->
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">{{ __('Descrizione') }}</label>
                            <textarea 
                                name="description" 
                                id="description" 
                                class="form-control" 
                                rows="6" 
                                required>{{ $product->description }}</textarea>
                        </div>

                        <!-- Prezzo -->
                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">{{ __('Prezzo') }}</label>
                            <input 
                                type="number" 
                                name="price" 
                                id="price" 
                                value="{{ $product->price }}" 
                                step="0.01" 
                                min="0" 
                                class="form-control" 
                                required>
                        </div>

                        <!-- Pulsante di Invio -->
                        <button type="submit" class="btn btn-primary">
                            {{ __('Aggiorna Prodotto') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
