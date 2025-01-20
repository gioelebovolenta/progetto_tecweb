<x-guest-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div>
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h5>{{ __('Password Dimenticata') }}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ __('Hai dimenticato la tua password? Nessun problema. Facci sapere il tuo indirizzo email e ti invieremo un link per reimpostare la password.') }}</p>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" type="email" name="email" class="form-control" required autofocus />
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Invia Link di Reimpostazione Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
