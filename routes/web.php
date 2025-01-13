<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');
Route::post('/products', [ProductController::class, 'store'])->middleware('auth');
Route::get('/products/published', function () {
    return view('products.published');
});

Route::get('/search', SearchController::class);

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
    // Rotta per la dashboard utente
    Route::get('/user/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');

    // Gestione del profilo
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotte per la gestione dei prodotti
    Route::get('/user/manage-products', [App\Http\Controllers\UserController::class, 'manageProducts'])->name('user.manage-products');
    Route::get('/user/purchased-products', [App\Http\Controllers\UserController::class, 'purchasedProducts'])->name('user.purchased-products');
    Route::get('/user/products/{id}/edit', [App\Http\Controllers\UserController::class, 'editProduct'])->name('user.edit-product');
    Route::delete('/user/products/{id}', [App\Http\Controllers\UserController::class, 'deleteProduct'])->name('user.delete-product');
    Route::patch('/user/products/{id}', [App\Http\Controllers\UserController::class, 'updateProduct'])->name('user.update-product');
});


require __DIR__.'/auth.php';
