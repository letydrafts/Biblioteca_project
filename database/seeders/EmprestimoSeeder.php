<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Emprestimo;
use App\Models\Exemplar;
use Carbon\Carbon;

class EmprestimoSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $exemplares = Exemplar::all();

        if ($users->isEmpty() || $exemplares->isEmpty()) {
            $this->command->warn('Usuários ou Exemplares não encontrados. Rode os seeders correspondentes.');
            return;
        }

        foreach ($exemplares->take(10) as $exemplar) {
            $user = $users->random();

            $dataEmprestimo = Carbon::now()->subDays(rand(0, 10));
            $dataDevolucao = $dataEmprestimo->copy()->addDays(7);

            Emprestimo::create([
                'user_id' => $user->id,
                'exemplar_id' => $exemplar->id,
                'data_empréstimo' => $dataEmprestimo,
                'data_devolucao' => $dataDevolucao,
            ]);

        }
    }
}



