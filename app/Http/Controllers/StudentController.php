<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController
{
  // GET /students - Listar todos los estudiantes
  public function index()
  {
    return response()->json(Student::all());
  }


  // POST /students - Crear un nuevo estudiante
  public function create(Request $request)
  {
    $validated = $request->validate([
      'nombre' => 'required|string',
      'apellidos' => 'required|string',
      'ci' => 'required|string|unique:students,ci',
      'facultad' => 'required|string',
      'carrera' => 'required|string',
      'anho' => 'required|string',
      'edificio' => 'required|string',
      'cuarto' => 'required|string',
      'sexo' => 'required|string',
      'provincia' => 'required|string',
      'municipio' => 'required|string',
      'direccion' => 'required|string',
      'telefonoPersonal' => 'required|string',
      'telefonoFamiliar' => 'nullable|string',
      'enfermedades' => 'nullable|string',
      'medicamentos' => 'nullable|string',
      'aprovechamiento' => 'required|string',
      'cadeteFAR' => 'required|in:Sí,No',
      'cadeteMININT' => 'required|in:Sí,No',
      'militante' => 'required|in:Sí,No',
      'proceso' => 'nullable|string',
    ]);

    $student = Student::create($validated);

    return response()->json($student, 201);
  }

  // GET /students/{id} - Obtener un estudiante específico
  public function get($id)
  {
    $student = Student::find($id);
    if (!$student) {
      return response()->json(['message' => 'Estudiante no encontrado'], 404);
    }
    return response()->json($student);
  }

  // PUT /students/{id} - Editar un estudiante existente
  public function edit(Request $request, $id)
  {
    $student = Student::find($id);
    if (!$student) {
      return response()->json(['message' => 'Estudiante no encontrado'], 404);
    }

    $validated = $request->validate([
      'nombre' => 'sometimes|string',
      'apellidos' => 'sometimes|string',
      'ci' => 'sometimes|string|unique:students,ci,' . $student->id,
      'facultad' => 'sometimes|string',
      'carrera' => 'sometimes|string',
      'anho' => 'sometimes|string',
      'edificio' => 'sometimes|string',
      'cuarto' => 'sometimes|string',
      'sexo' => 'sometimes|string',
      'provincia' => 'sometimes|string',
      'municipio' => 'sometimes|string',
      'direccion' => 'sometimes|string',
      'telefonoPersonal' => 'sometimes|string',
      'telefonoFamiliar' => 'nullable|string',
      'enfermedades' => 'nullable|string',
      'medicamentos' => 'nullable|string',
      'aprovechamiento' => 'sometimes|string',
      'cadeteFAR' => 'sometimes|in:Sí,No',
      'cadeteMININT' => 'sometimes|in:Sí,No',
      'militante' => 'sometimes|in:Sí,No',
      'proceso' => 'nullable|string',
    ]);

    $student->update($validated);

    return response()->json($student);
  }

  // DELETE /students/{id} - Eliminar un estudiante
  public function delete($id)
  {
    $student = Student::find($id);
    if (!$student) {
      return response()->json(['message' => 'Estudiante no encontrado'], 404);
    }

    $student->delete();
    return response()->json(['message' => 'Estudiante eliminado']);
  }
}
