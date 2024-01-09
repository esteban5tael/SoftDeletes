<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Clase Customer
 *
 * @property $id
 * @property $name
 * @property $phone
 * @property $email
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Customer extends Model
{
  use SoftDeletes; // Habilita el uso de soft deletes (eliminaciones suaves)

  static $rules = [ // Reglas de validación para los campos del modelo
    'name' => 'required',
    'phone' => 'required',
    'email' => 'required',
  ];

  protected $fillable = ['name', 'phone', 'email']; // Define los campos que pueden ser llenados en masa

  protected $dates = ['deleted_at']; // Define el campo 'deleted_at' como un campo de tipo fecha
  /*  */
}
