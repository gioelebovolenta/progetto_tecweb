<x-guest-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div>
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h5>{{ __('Conferma Password') }}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ __('Questa è un\'area protetta dell\'applicazione. Conferma la tua password prima di continuare.') }}</p>
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password" />
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Conferma') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
