<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombres' => 'Pedro',
            'apellidos' => 'Guzman',
            'email' => 'my.rg.developer@gmail.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 1,
            'empresa_id' => 1
        ]);

        User::create([
            'nombres' => 'Adalberto',
            'apellidos' => 'Moreno Cardenas',
            'email' => 'beto@gmail.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 1,
            'empresa_id' => 2
        ]);
    }
}
