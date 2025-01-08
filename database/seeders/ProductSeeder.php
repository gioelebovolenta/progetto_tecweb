<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // Assicurati di importare il modello Product
use Illuminate\Support\Arr; // Importa la classe Arr per utilizzare la funzione random

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(200)->create();
    }
}
