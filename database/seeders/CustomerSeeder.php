<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Ejecuta la inserción de datos en la base de datos.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Crea una instancia de Faker para generar datos simulados

        for ($i = 0; $i < 1000; $i++) {
            // Bucle para crear 1000 registros de clientes con datos aleatorios
            Customer::create([
                'name' => $faker->name, // Genera un nombre aleatorio
                'phone' => $faker->phoneNumber, // Genera un número de teléfono aleatorio
                'email' => $faker->unique()->safeEmail, // Genera un correo electrónico aleatorio y único
            ]);
        }
    }
}
