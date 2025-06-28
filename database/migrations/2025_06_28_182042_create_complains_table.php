<?php

use App\Models\Student;
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
    Schema::create('complains', function (Blueprint $table) {
      $table->id(); // ID personalizado
      $table->foreignIdFor(Student::class);
      $table->text('descripcion');
      $table->enum('tipo', ['Administrativa', ['Educativa']]);
      $table->date('fecha');
      $table->string('edificio');
      $table->enum('estado', ['pendiente', 'solucionada', 'rechazada', 'en_proceso', 'sin_solucion'])->default('pendiente');
      $table->boolean('visible')->default(true);
      $table->text('respuesta')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('complains');
  }
};
