<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Rotta per la dashboard con reindirizzamento basato sul ruolo
Route::get('/dashboard', function () {
    $user = auth()->user();

    // Controlla se l'utente è l'amministratore
    if ($user && $user->email === config('app.admin_email')) {
        return redirect()->route('admin.dashboard');
    }

    // Reindirizza alla dashboard dell'utente
    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotte per l'area amministrativa
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users.index');
    Route::delete('/admin/users/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/admin/products', [App\Http\Controllers\AdminController::class, 'products'])->name('admin.products.index');
    Route::delete('/admin/products/{id}', [App\Http\Controllers\AdminController::class, 'deleteProduct'])->name('admin.products.delete');
});

// Rotte per l'area utenti
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
