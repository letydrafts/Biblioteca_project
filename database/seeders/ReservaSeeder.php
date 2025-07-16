<?php

namespace Database\Seeders;

use App\Models\Reserva;
use App\Models\User;
use App\Models\Exemplar;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReservaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        $users = User::all();
        $exemplares = Exemplar::all();

        if ($users->isEmpty() || $exemplares->isEmpty()) {
            $this->command->warn('Não há usuários ou exemplares para criar reservas.');
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            Reserva::create([
                'data_reserva' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
                'status' => $faker->randomElement(['pendente', 'aprovada', 'rejeitada']),
                'user_id' => $users->random()->id,
                'livro_id' => $exemplares->random()->livro_id,
                'exemplar_id' => $exemplares->random()->id,
            ]);
        }
    }
}
