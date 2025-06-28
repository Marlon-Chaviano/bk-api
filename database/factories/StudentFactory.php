<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'nombre' => $this->faker->firstName(),
      'apellidos' => $this->faker->lastName(),
      'ci' => $this->faker->unique()->numerify('###########'),
      'facultad' => $this->faker->randomElement(['FMFC', 'FIE', 'FH', 'FC', 'FQF', 'FIMI', 'FEM', 'FCS', 'FCE', 'FCF', 'FEI']),
      'carrera' => $this->faker->randomElement(['Ing. Informática', 'Matemática', 'Física', 'Biología']),
      'anho' => $this->faker->randomElement(['1ro', '2do', '3ro', '4to', '5to']),
      'edificio' => 'Edificio ' . $this->faker->randomElement(['A1', 'B2', 'C3', 'C5']),
      'cuarto' => $this->faker->numberBetween(100, 413),
      'sexo' => $this->faker->randomElement(['masculino', 'femenino']),
      'provincia' => $this->faker->randomElement(['Villa Clara', 'La Habana', 'Holguín', 'Camagüey']),
      'municipio' => $this->faker->city(),
      'direccion' => $this->faker->streetAddress(),
      'telefonoPersonal' => $this->faker->numerify('5########'),
      'telefonoFamiliar' => $this->faker->numerify('5########'),
      'enfermedades' => $this->faker->randomElement(['Asma', 'Ninguna', 'Diabetes', 'Hipertensión']),
      'medicamentos' => $this->faker->randomElement(['Ketotifeno', 'Ninguno', 'Insulina']),
      'aprovechamiento' => $this->faker->randomElement(['Alto', 'Medio', 'Bajo']),
      'cadeteFAR' => $this->faker->randomElement(['si', 'no']),
      'cadeteMININT' => $this->faker->randomElement(['si', 'no']),
      'militante' => $this->faker->randomElement(['si', 'no']),
      'proceso' => $this->faker->randomElement(['Ninguno', 'Ingreso UJC', 'Revisión']),
    ];
  }
}
