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
        $categorias = Categoria::all();
        $editoras = Editora::all();

        if ($categorias->isEmpty() || $editoras->isEmpty()) {
            $this->command->warn('Categorias ou editoras não existem. Rode os seeders correspondentes antes.');
            return;
        }

        $livros = [
            'Dom Casmurro',
            'O Pequeno Príncipe',
            'Cem Anos de Solidão',
            'Grande Sertão: Veredas',
            'Memórias Póstumas de Brás Cubas',
            'A Hora da Estrela',
            'O Alquimista',
            'Ensaio sobre a Cegueira',
            'O Cortiço',
            'Capitães da Areia',
            'Vidas Secas',
            'Macunaíma',
            'Iracema',
            'Senhora',
            'O Primo Basílio',
            'A Moreninha',
            'O Guarani',
            'A Cidade e as Serras',
            'Sagarana',
            'O Auto da Compadecida',
        ];

        foreach ($livros as $nome) {
            Livro::create([
                'nome' => $nome,
                'isbn' => $this->gerarIsbn(),
                'categoria_id' => $categorias->random()->id,
                'editora_id' => $editoras->random()->id,
            ]);
        }
    }

    private function gerarIsbn(): string
    {
        // Gera um número ISBN numérico de 10 dígitos
        return (string)random_int(1000000000, 9999999999);
    }
}

