<x-guest-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h5>{{ __('Verifica il tuo Indirizzo Email') }}</h5>
                    </div>
                    <div class="card-body">
                        <p>{{ __('Grazie per esserti registrato! Prima di iniziare, verifica il tuo indirizzo email cliccando sul link che ti abbiamo inviato. Se non hai ricevuto l\'email, te ne invieremo un\'altra.') }}</p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success" role="alert">
                                {{ __('Un nuovo link di verifica è stato inviato al tuo indirizzo email.') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reinvia Email di Verifica') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Logout') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
