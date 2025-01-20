<x-guest-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div>
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h5>{{ __('Registrati') }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Nome') }}</label>
                                <input id="name" type="text" name="name" class="form-control" required autofocus />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" type="email" name="email" class="form-control" required />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password" />
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('Conferma Password') }}</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required />
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
