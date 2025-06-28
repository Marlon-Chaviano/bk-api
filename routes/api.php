<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\Complain;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'create']);
Route::get('/students/{id}', [StudentController::class, 'get']);
Route::put('/students/{id}', [StudentController::class, 'edit']);
Route::delete('/students/{id}', [StudentController::class, 'delete']);

Route::get('/complains', [ComplainController::class, 'index']);
Route::get('/complains/visible', [ComplainController::class, 'visible']);
Route::get('/complains/student/{student_id}', [ComplainController::class, 'byStudent']);
Route::post('/complains', [ComplainController::class, 'create']);
Route::get('/complains/{id}', [ComplainController::class, 'get']);
Route::put('/complains/{id}', [ComplainController::class, 'edit']);
Route::delete('/complains/{id}', [ComplainController::class, 'delete']);
