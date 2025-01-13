<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilePathToProductsTable extends Migration
{
    /**
     * Esegui la migrazione.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('file_path')->nullable()->after('type'); // Colonna per il percorso del file
        });
    }

    /**
     * Ripristina la migrazione.
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('file_path');
        });
    }
}
