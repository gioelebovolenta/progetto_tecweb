<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h4 class="mb-0 fw-bold">Carica Materiale</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="/products" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf

                            <!-- Materia -->
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">
                                    <i class="bi bi-book me-2"></i>Materia
                                </label>
                                <input type="text" class="form-control rounded-pill form-control-sm" id="title" name="title" placeholder="es. Tecnologie Web" required>
                                <div class="invalid-feedback">Questo campo è obbligatorio.</div>
                            </div>

                            <!-- Descrizione -->
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">
                                    <i class="bi bi-pencil-square me-2"></i>Descrizione
                                </label>
                                <textarea class="form-control rounded-3 form-control-sm" id="description" name="description" rows="4" placeholder="es. Appunti di tecnologie web..." required></textarea>
                                <div class="invalid-feedback">Questo campo è obbligatorio.</div>
                            </div>

                            <!-- Prezzo -->
                            <div class="mb-3">
                                <label for="price" class="form-label fw-semibold">
                                    <i class="bi bi-currency-euro me-2"></i>Prezzo
                                </label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text bg-primary text-white rounded-start-pill">€</span>
                                    <input type="number" class="form-control rounded-end-pill" id="price" name="price" step="0.01" min="0" required>
                                    <div class="invalid-feedback">Inserisci un prezzo valido.</div>
                                </div>
                            </div>

                            <!-- Facoltà -->
                            <div class="mb-3">
                                <label for="subject" class="form-label fw-semibold">
                                    <i class="bi bi-building me-2"></i>Facoltà
                                </label>
                                <input type="text" class="form-control rounded-pill form-control-sm" id="subject" name="subject" placeholder="es. Informatica" required>
                                <div class="invalid-feedback">Questo campo è obbligatorio.</div>
                            </div>

                            <!-- Tipo -->
                            <div class="mb-3">
                                <label for="type" class="form-label fw-semibold">
                                    <i class="bi bi-list-task me-2"></i>Tipo
                                </label>
                                <select class="form-select rounded-pill form-select-sm" id="type" name="type" required>
                                    <option value="" selected disabled>Seleziona il tipo di materiale</option>
                                    <option value="Libri">Libro</option>
                                    <option value="Appunti">Appunti</option>
                                    <option value="Esami">Esame</option>
                                </select>
                                <div class="invalid-feedback">Seleziona un'opzione valida.</div>
                            </div>

                            <!-- File -->
                            <div class="mb-3">
                                <label for="file" class="form-label fw-semibold">
                                    <i class="bi bi-file-earmark-arrow-up me-2"></i>Carica PDF
                                </label>
                                <input type="file" class="form-control rounded-pill form-control-sm" id="file" name="file" required>
                                <div class="invalid-feedback">Carica un file PDF.</div>
                            </div>

                            <hr class="my-3">

                            <!-- Pulsante Pubblica -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill fw-bold btn-sm">
                                    <i class="bi bi-cloud-upload me-2"></i>Pubblica
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
