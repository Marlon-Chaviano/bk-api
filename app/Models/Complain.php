<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
  /** @use HasFactory<\Database\Factories\ComplainFactory> */
  use HasFactory;
  protected $fillable = [
    'student_id',
    'descripcion',
    'tipo',
    'fecha',
    'edificio',
    'estado',
    'visible',
    'respuesta',
  ];
  public function student()
  {
    return $this->belongsTo(Student::class);
  }
}
