<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Esegui la migrazione.
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relazione con gli utenti
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Relazione con i prodotti
            $table->timestamps();
        });
    }

    /**
     * Ripristina la migrazione.
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
