<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Controlla se l'utente è autenticato e se l'email corrisponde a quella dell'admin
        if (auth()->check() && auth()->user()->email === config('app.admin_email')) {
            return $next($request);
        }

        abort(403, 'Accesso negato');
    }
}
