<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ZonaUsuario;
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
            'nombres' => 'Gerardo',
            'apellidos' => 'Aguirre',
            'email' => 'gerardo@collectaglobal.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 1 // administrador 
        ]);

        User::create([
            'nombres' => 'Admin penafiel',
            'apellidos' => 'Hernández',
            'email' => 'adminpenafiel@collectaglobal.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 4, // administrador del cliente
            'empresa_id' => 1 
        ]);

        $francisco = User::create([
            'nombres' => 'Francisco',
            'apellidos' => 'Hernández',
            'email' => 'francisco@collectaglobal.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 3, // agente
            'empresa_id' => 1 
        ]);

        $yetzi = User::create([
            'nombres' => 'Yetzi',
            'apellidos' => 'Donis',
            'email' => 'yetzi@collectaglobal.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 3, // agente
            'empresa_id' => 1 
        ]);

        $luzMaria = User::create([
            'nombres' => 'Luz María',
            'apellidos' => 'García',
            'email' => 'luzmaria@collectaglobal.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 3, // agente
            'empresa_id' => 1
        ]);

        User::create([
            'nombres' => 'Alberto',
            'apellidos' => 'Sánchez',
            'email' => 'alberto@penafiel.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 2, // cliente
            'empresa_id' => 1
        ]);

        User::create([
            'nombres' => 'Héctor',
            'apellidos' => 'Serralde',
            'email' => 'hector@penafiel.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 2, // cliente
            'empresa_id' => 1
        ]);

        User::create([
            'nombres' => 'Efraín',
            'apellidos' => 'Cuervo',
            'email' => 'efrain@penafiel.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 2, // cliente
            'empresa_id' => 1
        ]);

        User::create([
            'nombres' => 'Areli',
            'apellidos' => 'Hernández',
            'email' => 'areli@penafiel.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 2, // cliente
            'empresa_id' => 1
        ]);

        User::create([
            'nombres' => 'Verónica',
            'apellidos' => 'López',
            'email' => 'veronica@penafiel.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 2, // cliente
            'empresa_id' => 1
        ]);

        User::create([
            'nombres' => 'Esbe',
            'apellidos' => 'Pérez',
            'email' => 'esbe@penafiel.com',
            'password' => Hash::make('12345'),
            'tipo_usuario_id' => 2, // cliente
            'empresa_id' => 1
        ]);

        ZonaUsuario::create([
            'user_id'         => $francisco->id,
            'zona_empresa_id' => 1 // valle norte
        ]);

        ZonaUsuario::create([
            'user_id'         => $francisco->id,
            'zona_empresa_id' => 2 // valle sur
        ]);

        ZonaUsuario::create([
            'user_id'         => $yetzi->id,
            'zona_empresa_id' => 3 // centro
        ]);

        ZonaUsuario::create([
            'user_id'         => $yetzi->id,
            'zona_empresa_id' => 4 // pacifico
        ]);

        ZonaUsuario::create([
            'user_id'         => $luzMaria->id,
            'zona_empresa_id' => 5 // norte
        ]);

        ZonaUsuario::create([
            'user_id'         => $luzMaria->id,
            'zona_empresa_id' => 6 // bajio
        ]);

    }
}
