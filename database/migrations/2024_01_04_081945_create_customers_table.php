<?php





use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            /* Creación de la tabla 'customers' */
            $table->id()->startingValue(999); // Define el campo de identificación con un valor inicial de 999

            $table->string('name'); // Campo para el nombre del cliente
            $table->string('phone'); // Campo para el teléfono del cliente
            $table->string('email')->unique(); // Campo para el correo electrónico del cliente (único)

            $table->timestamps(); // Campos 'created_at' y 'updated_at' para el seguimiento temporal de registros
            $table->softDeletes(); // Campo 'deleted_at' para habilitar eliminaciones suaves (soft deletes)
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers'); // Elimina la tabla 'customers' si la migración es revertida
    }
};
/*  */
