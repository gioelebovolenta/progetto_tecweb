<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>uniShare</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 pb-20">
    <div class="min-h-full">
        <nav class="bg-gray-800 flex items-center justify-between px-4 py-3">
            <!-- Logo a sinistra -->
            <div class="flex items-center">
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.png')}}" width="170" height="130" alt="uniShare">
                </a>
            </div>

            <div class="flex-1 text-center ml-6">
                <h1 class="text-white text-3xl font-bold">Fai fruttare i tuoi appunti!</h1>
            </div>
    
            <!-- Pulsanti a destra -->
            <div class="flex items-center mr-6 space-x-3">
                @guest
                    <x-nav-link href="/login" :active="request()->is('login')">Accedi</x-nav-link>
                    <x-nav-link href="/register" :active="request()->is('register')">Registrati</x-nav-link>
                @endguest
            
                @auth
                    <!-- Modulo separato per il pulsante Dashboard -->
                    <form method="GET" action="{{ auth()->user()->email === config('app.admin_email') 
                        ? route('admin.dashboard') 
                        : route('user.dashboard') }}">
                        <x-form-button>
                            Dashboard
                        </x-form-button>
                    </form>
            
                    <!-- Modulo separato per il pulsante Logout -->
                    <form method="POST" action="/logout">
                        @csrf
                        <x-form-button>
                            Log out
                        </x-form-button>
                    </form>
                @endauth
            </div>
            
        </nav>
    </div>
    

    <!-- HEADER -->
    <header class="flex h-20 items-center justify-between px-10 bg-white shadow">
        <div class="flex items-center space-x-3">
            <x-tag href="{{ route('products.type', 'Libri') }}">Libri</x-tag>
            <x-tag href="{{ route('products.type', 'Appunti') }}">Appunti</x-tag>
            <x-tag href="{{ route('products.type', 'Esami') }}">Esami</x-tag>
    
            <!-- Barra di ricerca accanto ai tag-->
            <x-forms.form action="/search" method="GET" class="ml-4">
                <x-forms.input :label="false" name="q" placeholder="Cerca materiale" style="height: 44px;" class="rounded-xl px-5 py-2 border hover:border-gray-400 transition-colors duration-300 w-60" />
            </x-forms.form>
        </div>
    
        {{-- @auth
            <div>
                <x-forms.button href="/products/create">Vendi materiale</x-forms.button>
            </div>
        @endauth --}}

        @auth
            @if (auth()->user()->email !== config('app.admin_email'))
                <div>
                    <x-forms.button href="/products/create">Vendi materiale</x-forms.button>
                </div>
            @endif
        @endauth
    </header>

    <!-- MAIN -->
    <main class="mt-10 mx-auto">
        {{ $slot }}
    </main>    
</body>

</html>