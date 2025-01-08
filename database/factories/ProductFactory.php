<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * The name of the model that this factory is for.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Definizione delle facoltà e delle materie associate
        $faculties = [
            'Ingegneria' => ['Analisi Matematica', 'Fisica Tecnica', 'Elettronica'],
            'Medicina' => ['Anatomia', 'Fisiologia', 'Patologia'],
            'Giurisprudenza' => ['Diritto Privato', 'Diritto Penale', 'Diritto Civile', 'Diritto Costituzionale'],
            'Economia' => ['Microeconomia', 'Macroeconomia', 'Statistica'],
            'Informatica' => ['Algoritmi', 'Reti di Calcolatori', 'Programmazione', 'Tecnologie Web'],
            'Lingue e Letterature Straniere' => ['Letteratura Inglese', 'Linguistica applicata', 'Cultura e Civiltà Francese'],
            'Chimica e Tecnologie Farmaceutiche' => ['Farmacologia', 'Chimica farmaceutica', 'Chimica organica', 'Patologia'],
            'Psicologia Clinica' => ['Psicopatologia clinica', 'Etica della ricerca e deontologia professionale', 'Sviluppo psicologico tipico e atipico']
        ];

        // Scegli una facoltà casuale
        $subject = $this->faker->randomElement(array_keys($faculties));

        // Scegli una materia associata alla facoltà
        $title = $this->faker->randomElement($faculties[$subject]);

        // Scegli il tipo di prodotto
        $type = $this->faker->randomElement(['libro', 'appunti', 'esame']);

        // Definisci il numero di pagine in base al tipo
        $pages = match ($type) {
            'libro', 'appunti' => $this->faker->numberBetween(20, 500), // Range da 20 a 500
            'esame' => $this->faker->numberBetween(2, 15),             // Range da 1 a 15
            default => 0,                                              // Default nel caso di errori
        };

        return [
            'user_id' => User::factory(), // Associa il prodotto a un utente creato dalla UserFactory
            'title' => $title,
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 100), // Prezzo tra 5 e 100
            'subject' => $subject,
            'type' => $type,
            'pages' => $pages, // Numero di pagine generato dinamicamente
        ];
    }
}
