<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController
{
  public function login(Request $request)
  {
    $request->validate([
      'username' => 'required|string',
      'password' => 'required|string',
    ]);

    $user = User::where('username', $request->username)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return response()->json(['message' => 'Credenciales inválidas'], 401);
    }
    return response()->json([
      'user' => $user,
    ]);
  }

  public function logout(Request $request)
  {
    return response()->json(['message' => 'Sesión cerrada'], 200);
  }
}
