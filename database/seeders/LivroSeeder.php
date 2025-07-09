<?php

namespace Database\Seeders;

use App\Models\Livro;
use App\Models\Categoria;
use App\Models\Editora;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');

        $categorias = Categoria::all();
        $editoras = Editora::all();

        if ($categorias->isEmpty() || $editoras->isEmpty()) {
            $this->command->warn('Categorias ou editoras não existem. Rode os seeders correspondentes antes.');
            return;
        }

        for ($i = 0; $i < 30; $i++) {
            Livro::create([
                'nome' => $faker->sentence(3),
                'isbn' => $faker->unique()->numerify('##########'),
                'categoria_id' => $categorias->random()->id,
                'editora_id' => $editoras->random()->id,
            ]);
        }
    }
}

