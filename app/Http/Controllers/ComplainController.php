<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainController
{
  // GET /Complains - Listar todas las Complains
  public function index()
  {
    return response()->json(Complain::with('student')->get());
  }
  public function byStudent($student_id)
  {
    $complains = Complain::with('student')
      ->where('student_id', $student_id)
      ->get();

    return response()->json($complains);
  }

  public function visible()
  {
    return response()->json(Complain::all()->where('visible', '=', '1'));
  }
  // POST /Complains - Crear una nueva Complain
  public function create(Request $request)
  {
    $validated = $request->validate([
      'student_id' => 'required|exists:students,id',
      'descripcion' => 'required|string',
      'tipo' => 'required|string',
      'fecha' => 'required|date',
      'edificio' => 'required|string',
      'estado' => 'nullable|string',
      'visible' => 'nullable|boolean',
      'respuesta' => 'nullable|string',
    ]);

    $complaintsToday = \App\Models\Complain::where('student_id', $validated['student_id'])
      ->whereDate('fecha', now()->toDateString())
      ->count();

    if ($complaintsToday >= 3) {
      return response()->json([
        'message' => 'Solo puede enviar 3 quejas diarias.'
      ], 403);
    }

    $Complain = Complain::create($validated);

    return response()->json($Complain, 201);
  }

  // GET /Complains/{id} - Obtener una Complain específica
  public function get($id)
  {
    $Complain = Complain::with('student')->find($id);
    if (!$Complain) {
      return response()->json(['message' => 'Complain no encontrada'], 404);
    }
    return response()->json($Complain);
  }

  // PUT /Complains/{id} - Editar una Complain existente
  public function edit(Request $request, $id)
  {
    $Complain = Complain::find($id);
    if (!$Complain) {
      return response()->json(['message' => 'Complain no encontrada'], 404);
    }

    $validated = $request->validate([
      'student_id' => 'sometimes|exists:students,id',
      'descripcion' => 'sometimes|string',
      'tipo' => 'sometimes|string',
      'fecha' => 'sometimes|date',
      'edificio' => 'sometimes|string',
      'estado' => 'sometimes|string',
      'visible' => 'sometimes|boolean',
      'respuesta' => 'nullable|string',
    ]);

    $Complain->update($validated);

    return response()->json($Complain);
  }

  // DELETE /Complains/{id} - Eliminar una Complain
  public function delete($id)
  {
    $Complain = Complain::find($id);
    if (!$Complain) {
      return response()->json(['message' => 'Complain no encontrada'], 404);
    }

    $Complain->delete();
    return response()->json(['message' => 'Complain eliminada']);
  }
}
