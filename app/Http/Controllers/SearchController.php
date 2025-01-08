<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke() {
        $products = Product::where('title', 'LIKE', '%'.request('q').'%')->orWhere('subject', 'LIKE', '%'.request('q').'%')->get();

        return view('results', ['products' => $products]);
    }
}
