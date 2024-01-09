<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Ejecuta la inserción de datos en la base de datos.
     */
    public function run(): void
    {
        // Crea un usuario 'admin'
        User::create([
            'name' => 'Admin', // Nombre del usuario
            'email' => 'admin@admin.com', // Correo electrónico del usuario
            'email_verified_at' => Carbon::now(), // Fecha y hora de verificación del correo electrónico
            'password' => Hash::make('12345678'), // Contraseña encriptada usando Hash
        ]);

        // Crea un usuario 'user'
        User::create([
            'name' => 'User', // Nombre del usuario
            'email' => 'user@user.com', // Correo electrónico del usuario
            'email_verified_at' => Carbon::now(), // Fecha y hora de verificación del correo electrónico
            'password' => Hash::make('12345678'), // Contraseña encriptada usando Hash
        ]);
    }
}
