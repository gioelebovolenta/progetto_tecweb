<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __invoke()
    {
        $query = request('q');

        $products = Product::where('user_id', '!=', Auth::id()) // Escludi i prodotti dell'utente autenticato
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', '%'.$query.'%')
                ->orWhere('subject', 'LIKE', '%'.$query.'%');
            })
            ->get();

        return view('products.results', ['products' => $products]);
    }
}
