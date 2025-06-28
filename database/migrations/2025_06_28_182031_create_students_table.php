<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('students', function (Blueprint $table) {
      $table->id();
      $table->string('nombre');
      $table->string('apellidos');
      $table->string('ci')->unique();
      $table->string('facultad');
      $table->string('carrera');
      $table->string('anho');
      $table->string('edificio');
      $table->string('cuarto');
      $table->string('sexo');
      $table->string('provincia');
      $table->string('municipio');
      $table->string('direccion');
      $table->string('telefonoPersonal');
      $table->string('telefonoFamiliar')->nullable();
      $table->string('enfermedades')->nullable();
      $table->string('medicamentos')->nullable();
      $table->string('aprovechamiento')->nullable();
      $table->enum('cadeteFAR', ['si', 'no'])->default('no');
      $table->enum('cadeteMININT', ['si', 'no'])->default('no');
      $table->enum('militante', ['si', 'no'])->default('no');
      $table->string('proceso')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('students');
  }
};
