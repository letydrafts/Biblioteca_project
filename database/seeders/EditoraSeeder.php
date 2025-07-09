<?php

namespace Database\Seeders;

use App\Models\Editora;
use Illuminate\Database\Seeder;

class EditoraSeeder extends Seeder
{
    public function run(): void
    {
        $editoras = [
            'Companhia das Letras',
            'Editora Rocco',
            'Intrínseca',
            'Record',
            'HarperCollins Brasil',
            'Planeta',
            'Sextante',
            'DarkSide Books',
            'Aleph',
            'Globo Livros'
        ];

        foreach ($editoras as $nome) {
            Editora::create([
                'nome' => $nome,
                'cnpj' => fake()->unique()->numerify('##.###.###/####-##'),
                'email' => fake()->unique()->companyEmail,
                'telefone' => fake()->phoneNumber,
                'site' => fake()->url,
            ]);
        }
    }
}
