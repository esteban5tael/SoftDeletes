<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Ejecuta los seeders para poblar la base de datos.
     */
    public function run(): void
    {
        // Llama a los seeders para insertar datos en la base de datos
        $this->call([
            UserSeeder::class, // Llama al seeder para crear usuarios
            CustomerSeeder::class, // Llama al seeder para crear clientes
        ]);
    }
}
