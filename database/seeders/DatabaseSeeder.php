<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);


        $admin = User::factory()->create([
            'name' => 'Admin Biblioteca',
            'cpf' => '12345678901',
            'email' => 'adm@gmail.com',
            'password' => bcrypt('adminbiblio'),
        ]);
        $admin->assignRole('admin');

        $usuarios = [
            [
                'name' => 'João Silva',
                'cpf' => '11122233344',
                'email' => 'joao@gmail.com',
            ],
            [
                'name' => 'Maria Oliveira',
                'cpf' => '22233344455',
                'email' => 'maria@gmail.com',
            ],
            [
                'name' => 'Lucas Costa',
                'cpf' => '33344455566',
                'email' => 'lucas@gmail.com',
            ],
            [
                'name' => 'Ana Souza',
                'cpf' => '44455566677',
                'email' => 'ana@gmail.com',
            ],
        ];

        foreach ($usuarios as $data) {
            $user = User::create([
                'name' => $data['name'],
                'cpf' => $data['cpf'],
                'email' => $data['email'],
                'password' => Hash::make('12345678'),
            ]);
            $user->assignRole('user');
        }
    }
}

