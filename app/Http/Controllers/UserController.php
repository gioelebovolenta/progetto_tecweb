<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors('Devi essere autenticato per accedere a questa pagina.');
        }

        // Conta i prodotti caricati dall'utente
        $productsForSale = Product::where('user_id', $user->id)->count();

        // Conta i prodotti acquistati dall'utente
        $purchasedProducts = $user->purchasedProducts()->count();

        return view('user.dashboard', compact('productsForSale', 'purchasedProducts'));
    }

    public function manageProducts()
    {
        $user = Auth::user();
        $products = Product::where('user_id', $user->id)->get();
        return view('user.manage-products', compact('products'));
    }

    public function purchasedProducts()
    {
        $purchasedProducts = Auth::user()->purchasedProducts()->get(); // Relazione con i prodotti acquistati
        return view('user.purchased-products', compact('purchasedProducts'));
    }

    public function editProduct($id)
    {
        // Recupera il prodotto con l'ID specificato
        $product = Product::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        // Restituisce la vista di modifica con i dati del prodotto
        return view('user.edit-product', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        // Recupera il prodotto dell'utente
        $product = Product::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        // Valida i dati in arrivo
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Aggiorna il prodotto
        $product->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Reindirizza con un messaggio di successo
        return redirect()->route('user.manage-products')->with('success', 'Prodotto aggiornato con successo!');
    }

    public function deleteProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return response()->json(['success' => true, 'message' => 'Prodotto eliminato con successo.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Errore durante l\'eliminazione del prodotto.']);
        }
    }
}
