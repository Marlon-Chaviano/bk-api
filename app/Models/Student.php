<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  /** @use HasFactory<\Database\Factories\StudentFactory> */
  use HasFactory;
  protected $fillable = [
    'nombre',
    'apellidos',
    'ci',
    'facultad',
    'carrera',
    'anho',
    'edificio',
    'cuarto',
    'sexo',
    'provincia',
    'municipio',
    'direccion',
    'telefonoPersonal',
    'telefonoFamiliar',
    'enfermedades',
    'medicamentos',
    'aprovechamiento',
    'cadeteFAR',
    'cadeteMININT',
    'militante',
    'proceso',
  ];

  public function complains()
  {
    return $this->hasMany(Complain::class);
  }
}
