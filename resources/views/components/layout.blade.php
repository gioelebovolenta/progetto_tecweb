<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>uniShare</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light pb-4">
    <div class="min-vh-100 d-flex flex-column">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 py-3">
            <!-- Logo a sinistra -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ Vite::asset('resources/images/logo2.png') }}" class="img-fluid" style="width: 150px; height: 100px;" alt="uniShare">
            </a>


            <!-- Titolo al centro -->
            <div class="flex-fill text-center">
                <h1 class="text-white fs-3 fw-bold">Fai fruttare i tuoi appunti!</h1>
            </div>

            <!-- Pulsanti a destra -->
            <div class="d-flex align-items-center ms-auto">
                @guest
                    <a href="/login" class="btn btn-outline-light me-2">Accedi</a>
                    <a href="/register" class="btn btn-outline-light">Registrati</a>
                @endguest
            
                @auth
                    <!-- Modulo separato per il pulsante Dashboard -->
                    <form method="GET" action="{{ auth()->user()->email === config('app.admin_email') 
                        ? route('admin.dashboard') 
                        : route('user.dashboard') }}" class="me-2">
                        <button class="btn btn-primary">Dashboard</button>
                    </form>
            
                    <!-- Dropdown User Menu -->
                    <div class="dropdown">
                        <button 
                            class="btn btn-light border rounded-circle d-flex align-items-center justify-content-center" 
                            type="button" 
                            id="userMenuButton" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"
                            style="width: 40px; height: 40px; padding: 0;"
                        >
                            <i class="bi bi-person-circle fs-4 text-dark"></i> <!-- Icona di un omino -->
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenuButton">
                            <!-- Link Profilo -->
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    Profilo
                                </a>
                            </li>
                            <!-- Divider -->
                            <li><hr class="dropdown-divider"></li>
                            <!-- Logout -->
                            <li>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </nav>
    
        <!-- HEADER -->
        <header class="d-flex align-items-center justify-content-between px-4 py-3 bg-white shadow-sm">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('products.type', 'Libri') }}" class="btn btn-outline-primary">Libri</a>
                <a href="{{ route('products.type', 'Appunti') }}" class="btn btn-outline-primary">Appunti</a>
                <a href="{{ route('products.type', 'Esami') }}" class="btn btn-outline-primary">Esami</a>
    
                <!-- Barra di ricerca accanto ai tag-->
                <form action="/search" method="GET" class="ms-4">
                    <input 
                        type="text" 
                        name="q" 
                        placeholder="Cerca materiale" 
                        class="form-control rounded-pill px-4 py-2 shadow-sm" 
                        style="width: 165px;"
                    />
                </form>
            </div>
    
            @auth
                @if (auth()->user()->email !== config('app.admin_email'))
                    <div>
                        <a href="/products/create" class="btn btn-success">Vendi materiale</a>
                    </div>
                @endif
            @endauth
        </header>

        <!-- MAIN -->
        <main class="container mt-4">
            {{ $slot }}
        </main>    
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
