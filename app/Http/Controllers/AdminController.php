<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product; 
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Mostra la dashboard dell'amministratore.
     */
    public function index()
    {
        // Conta il totale degli utenti e dei materiali
        $totalUsers = User::count();
        $totalProducts = Product::count(); // Modifica se il modello ha un nome diverso

        // Passa i dati alla vista
        return view('admin.dashboard', compact('totalUsers', 'totalProducts'));
    }

    public function users(Request $request)
    {
        $query = $request->input('query');
        $users = User::when($query, function ($q) use ($query) {
            $q->where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%");
        })->paginate(10); // Pagina di 10 utenti

        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'Utente eliminato con successo.');
        }

        return redirect()->route('admin.users.index')->with('error', 'Utente non trovato.');
    }

    public function products(Request $request)
    {
        $query = $request->input('query');
        $products = Product::when($query, function ($q) use ($query) {
            $q->where('title', 'like', "%$query%");
        })->paginate(10);

        return view('admin.products', compact('products'));
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('admin.products.index')->with('success', 'Materiale eliminato con successo.');
        }

        return redirect()->route('admin.products.index')->with('error', 'Materiale non trovato.');
    }
}