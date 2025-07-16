<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {

        Role::firstOrCreate(['name' => 'admin']);


        $user = User::factory()->create([
            'name' => 'Admin Biblioteca',
            'cpf' => '12345678901',
            'email' => 'adm@gmail.com',
            'password' => bcrypt('adminbiblio'),
        ]);

         $user->assignRole('admin');
    }
}