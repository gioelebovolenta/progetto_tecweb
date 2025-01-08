<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade'); // Colonna user_id con foreign key (riferimento alla tabella users)
            $table->string('title'); // Nome del prodotto (es. titolo del libro, nome degli appunti)
            $table->text('description')->nullable(); // Descrizione del prodotto
            $table->decimal('price', 10, 2); // Prezzo del prodotto
            $table->string('subject')->nullable(); // Materia o area disciplinare
            $table->enum('type', ['libro', 'appunti', 'esame']); // Tipo di prodotto (libro, appunto, esame)
            $table->integer('pages')->nullable(); // Numero di pagine del prodotto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
