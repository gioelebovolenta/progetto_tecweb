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
        $products = Product::availableForOthers()->get();
        return view('products.index', compact('products'));
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
            'type' => ['required', Rule::in(['Libri', 'Appunti', 'Esami'])],
            'file' => 'required|mimes:pdf|max:2048',
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
                // Esegui il comando pdfinfo per ottenere informazioni sul PDF
                $output = shell_exec("pdfinfo " . escapeshellarg($absolutePath) . " 2>&1");
                if ($output === null) {
                    throw new \Exception("Il comando pdfinfo non è riuscito a leggere il file.");
                }

                // Estrai il numero di pagine
                if (preg_match('/Pages:\s+(\d+)/', $output, $matches)) {
                    $pages = (int) $matches[1];
                } else {
                    throw new \Exception("Numero di pagine non trovato nel file PDF.");
                }
            } catch (\Exception $e) {
                \Log::error("Errore durante l'elaborazione del PDF: " . $e->getMessage());
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
            \Log::error("Errore durante il salvataggio del prodotto: " . $e->getMessage());
            return back()->withErrors(['error' => 'Errore durante il salvataggio del prodotto.']);
        }

        return redirect('/products/published')->with('success', 'Materiale caricato con successo!');
    }

    public function published()
    {
        // Esegui logica aggiuntiva, se necessaria
        return view('products.published');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function download(Product $product)
    {
        // Verifica che il prodotto non appartenga all'utente autenticato
        if ($product->user_id == auth()->id()) {
            return redirect()->back()->with('error', 'Non puoi acquistare il tuo stesso prodotto.');
        }

        // Verifica se il file esiste
        if (!$product->file_path || !Storage::disk('public')->exists($product->file_path)) {
            return back()->withErrors(['file' => 'Il file PDF non esiste o non è disponibile.']);
        }

        // Collegamento alla tabella purchases per utenti autenticati
        if (Auth::check()) {
            $user = Auth::user();

            // Verifica se il prodotto è già stato acquistato
            if (!$user->purchasedProducts->contains($product->id)) {
                $user->purchasedProducts()->attach($product->id);
            }
        } else {
            // Per i guest, mostra un messaggio di successo
            session()->flash('success', 'Acquisto effettuato con successo. Il download inizierà a breve.');
        }

        // Esegui il download del file
        return response()->download(storage_path('app/public/' . $product->file_path));
    }

    public function filterByType(string $type)
    {
        // Valida il tipo
        if (!in_array($type, ['Libri', 'Appunti', 'Esami'])) {
            abort(404, 'Tipo non valido');
        }

        // Recupera i prodotti del tipo richiesto
        $query = Product::where('type', $type);

        // Se l'utente è autenticato, escludi i prodotti già acquistati e quelli caricati dall'utente stesso
        if (Auth::check()) {
            $user = Auth::user();

            // Escludi prodotti acquistati
            $purchasedProductIds = $user->purchasedProducts->pluck('id');

            // Escludi prodotti caricati dall'utente
            $query->whereNotIn('id', $purchasedProductIds)
                ->where('user_id', '!=', $user->id);
        }

        // Ottieni i prodotti filtrati
        $products = $query->get();

        return view('products.filtered', compact('products', 'type'));
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

    public function purchaseProduct($productId)
    {
        $product = Product::findOrFail($productId);

        // Controlla se l'utente è autenticato
        if (Auth::check()) {
            $user = Auth::user();

            // Verifica se l'utente ha già acquistato il prodotto
            if (!$user->purchasedProducts->contains($product->id)) {
                $user->purchasedProducts()->attach($product->id);
            }
        } else {
            // Per i guest, aggiungi solo un messaggio di successo
            session()->flash('success', 'Acquisto effettuato con successo. Il download inizierà a breve.');
        }

        // Avvia il download del file
        return response()->download(storage_path('app/public/' . $product->file_path));
    }
}