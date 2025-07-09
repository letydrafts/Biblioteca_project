<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'Romance',
            'Fantasia',
            'Terror',
            'Ficção Científica',
            'Biografia',
            'Mistério',
            'Aventura',
            'Drama',
            'Histórico',
            'Poesia'
        ];

        foreach ($categorias as $index => $nome) {
            Categoria::create([
                'nome' => $nome,
                'codigo_classificacao' => 100 + $index,
            ]);
        }
    }
}
