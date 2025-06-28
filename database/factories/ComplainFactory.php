<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complain>
 */
class ComplainFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'student_id' => Student::factory(),
      'descripcion' => $this->faker->paragraph(),
      'tipo' => $this->faker->randomElement(['Administrativa', 'Educativa']),
      'fecha' => $this->faker->date(),
      'edificio' => 'Edificio ' . $this->faker->randomElement(['C1', 'C3', 'C5', 'U1', 'U2', 'U3', '900']),
      'estado' => $this->faker->randomElement(['pendiente', 'solucionada', 'rechazada', 'en_proceso', 'sin_solucion']),
      'visible' => $this->faker->boolean(80), // 80% visible
      'respuesta' => $this->faker->boolean(50) ? $this->faker->sentence() : null,
    ];
  }
}
