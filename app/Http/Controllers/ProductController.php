<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\PdfToText\Pdf;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validazione dei campi
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
        'subject' => 'required|string|max:255',
        'type' => ['required', Rule::in(['Libri', 'Appunti', 'Esami'])], // Deve essere uno dei valori accettati
        'file' => 'required|mimes:pdf|max:2048', // Solo file PDF, massimo 2 MB
    ], [
        'title.required' => 'Il campo titolo è obbligatorio.',
        'description.required' => 'Il campo descrizione è obbligatorio.',
        'price.required' => 'Il campo prezzo è obbligatorio.',
        'price.numeric' => 'Il campo prezzo deve essere un numero.',
        'subject.required' => 'Il campo materia è obbligatorio.',
        'type.required' => 'Devi selezionare il tipo di materiale.',
        'file.required' => 'Il campo file è obbligatorio.',
        'file.mimes' => 'Il file deve essere un PDF.',
    ]);

    $filePath = null;
    $pages = 0;

    // Carica il file PDF e ottieni il numero di pagine
    if ($request->hasFile('file')) {
        $filePath = $request->file('file')->store('products', 'public');
        $absolutePath = Storage::disk('public')->path($filePath);
    
        try {
            // Usa il comando pdfinfo per ottenere informazioni sul PDF
            $output = shell_exec("pdfinfo " . escapeshellarg($absolutePath) . " | grep Pages");
            preg_match('/Pages:\s+(\d+)/', $output, $matches);
            $pages = $matches[1] ?? 0; // Ottieni il numero di pagine
        } catch (\Exception $e) {
            return back()->withErrors(['file' => 'Errore nella lettura del file PDF.']);
        }
    }
    

    // Salva il prodotto nel database
    try {
        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'subject' => $request->subject,
            'type' => $request->type,
            'file_path' => $filePath,
            'pages' => $pages,
            'user_id' => Auth::id(),
        ]);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
    

    return redirect('/products/published')->with('success', 'Materiale caricato con successo!');
}


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    /* public function update(UpdateProductRequest $request, Product $product)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
