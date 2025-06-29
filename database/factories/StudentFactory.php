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
   *
   */

  public function definition(): array
  {
    $facultades = [
      'FMFC' => [ // Facultad de Matemática, Física y Computación
        'Lic.Matemática',
        'Lic.Física',
        'Ingeniería Informática',
        'Ciencias de la Computación',
        'Ciencias de la Información',
      ],
      'FIMI' => [ // Facultad de Ingeniería Mecánica e Industrial
        'Ingeniería Mecánica',
        'Ingeniería Industrial',
        'Lic. Educación Mecánica'
      ],
      'FQF' => [ // Facultad de Química - Farmacia
        'Ingeniería Química',
        'Química',
        'Lic.Farmacia'
      ],
      'FIE' => [ // Facultad de Ingeniería Eléctrica
        'Ingeniería Eléctrica',
        'Ingeniería Automática',
        'Ingeniería en Telecomunicaciones'
      ],
      'FCE' => [ // Facultad de Ciencias Económicas
        'Lic.Contabilidad y Finanzas',
        'Lic.Economía',
        'Lic.Turismo'
      ],
      'FEM' => [ // Facultad de Educación Media
        'Educación Matemática',
        'Educación Biología',
        'Educación Química',
        'Educación Física'
      ],
      'FCS' => [ // Facultad de Ciencias Sociales
        'Gestion Sociocultural para el Desarrollo',
        'Lic.Filosofía',
        'Lic.Sociología',
        'Lic.Psicología',
        'Lic.Derecho'
      ],
      'FCF' => [ // Facultad de Ciencias Farmacéuticas
        'Cultura Física',
      ],
      'FH' => [ // Facultad de Humanidades
        'Lic.Lengua Inglesa',
        'Lic.Comunicación Social',
        'Lic.Periodismo',
        'Lic.Letras'
      ],
      'FC' => [ // Facultad de Construcciones
        'Ingeniería Civil',
        'Arquitectura y Urbanismo',
        'Ingeniería Hidraulica',
        'Lic.Educación Construcción Civil'
      ],
      'FEI' => [ // Facultad de Educación Infantil
        'Educación Preescolar',
        'Educación Especial'
      ],
      'FCA' => [ // Facultad de Ciencias Agropecuarias
        'Ingeniería Agrícola',
        'Medicina Veterinaria',
        'Agronomía',
        'Biología',
        'Lic. Educación Agropecuaria'
      ],
    ];
    $provincias = [
      'Pinar del Río' => [
        'Pinar del Río',
        'Viñales',
        'San Juan y Martínez',
        'San Luis',
        'Guane'
      ],
      'Artemisa' => [
        'Artemisa',
        'Guanajay',
        'San Antonio de los Baños',
        'Bauta',
        'Bahía Honda'
      ],
      'La Habana' => [
        'Playa',
        'Marianao',
        'Centro Habana',
        'Habana Vieja',
        'Boyeros',
        'Cerro'
      ],
      'Mayabeque' => [
        'San José de las Lajas',
        'Güines',
        'Bejucal',
        'Melena del Sur',
        'Batabanó'
      ],
      'Matanzas' => [
        'Matanzas',
        'Cárdenas',
        'Colón',
        'Jovellanos',
        'Jagüey Grande'
      ],
      'Villa Clara' => [
        'Santa Clara',
        'Remedios',
        'Placetas',
        'Caibarién',
        'Sagua la Grande'
      ],
      'Cienfuegos' => [
        'Cienfuegos',
        'Palmira',
        'Cruces',
        'Rodas',
        'Abreus'
      ],
      'Sancti Spíritus' => [
        'Sancti Spíritus',
        'Trinidad',
        'Cabaiguán',
        'Yaguajay',
        'Fomento'
      ],
      'Ciego de Ávila' => [
        'Ciego de Ávila',
        'Morón',
        'Majagua',
        'Chambas',
        'Florencia'
      ],
      'Camagüey' => [
        'Camagüey',
        'Florida',
        'Vertientes',
        'Nuevitas',
        'Esmeralda'
      ],
      'Las Tunas' => [
        'Las Tunas',
        'Puerto Padre',
        'Jobabo',
        'Majibacoa',
        'Amancio'
      ],
      'Holguín' => [
        'Holguín',
        'Gibara',
        'Mayarí',
        'Banes',
        'Rafael Freyre'
      ],
      'Granma' => [
        'Bayamo',
        'Manzanillo',
        'Niquero',
        'Bartolomé Masó',
        'Media Luna'
      ],
      'Santiago de Cuba' => [
        'Santiago de Cuba',
        'Contramaestre',
        'Palma Soriano',
        'Songo-La Maya'
      ],
      'Guantánamo' => [
        'Guantánamo',
        'Baracoa',
        'Imías',
        'Maisí',
        'San Antonio del Sur'
      ],
      'Isla de la Juventud' => [
        'Nueva Gerona',
        'La Fe'
      ]
    ];

    $provincia = $this->faker->randomElement(array_keys($provincias));
    $municipio = $this->faker->randomElement($provincias[$provincia]);

    $facultad = $this->faker->randomElement(array_keys($facultades));
    $carrera = $this->faker->randomElement($facultades[$facultad]);
    return [
      'nombre' => $this->faker->firstName(),
      'apellidos' => $this->faker->lastName(),
      'ci' => $this->faker->unique()->numerify('###########'),
      'facultad' => $facultad,
      'carrera' => $carrera,
      'anho' => $this->faker->randomElement(['1ro', '2do', '3ro', '4to', '5to']),
      'edificio' => 'Edificio ' . $this->faker->randomElement(['A1', 'B2', 'C3', 'C5']),
      'cuarto' => $this->faker->numberBetween(100, 413),
      'sexo' => $this->faker->randomElement(['masculino', 'femenino']),
      'provincia' => $provincia,
      'municipio' => $municipio,
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
