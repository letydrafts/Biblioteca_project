<?php

namespace Database\Seeders;

use App\Models\Livro;
use App\Models\Exemplar;
use Illuminate\Database\Seeder;

class ExemplarSeeder extends Seeder
{
    public function run(): void
    {
        $livros = Livro::all();

        if ($livros->isEmpty()) {
            $this->command->warn('Nenhum livro encontrado. Rode o LivroSeeder primeiro.');
            return;
        }

        foreach ($livros as $livro) {

            $quantidade = rand(1, 3);
            for ($i = 0; $i < $quantidade; $i++) {
                Exemplar::create([
                    'livro_id' => $livro->id,
                    'codigo' => random_int(100000, 999999)
                ]);
            }
        }
    }
}
