<?php

use App\Models\Electrodomestics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/electrodomestics', [\App\Http\Controllers\Api\ElectrodomesticsController::class, 'index']);
Route::post('/electrodomestics', [\App\Http\Controllers\Api\ElectrodomesticsController::class, 'store']);
Route::get('/electrodomestics/{id}', [\App\Http\Controllers\Api\ElectrodomesticsController::class, 'show']);
Route::get('/electrodomestics/{id}/edit', [\App\Http\Controllers\Api\ElectrodomesticsController::class, 'edit'])->middleware('auth:sanctum');
Route::put('/electrodomestics/{id}', [\App\Http\Controllers\Api\ElectrodomesticsController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/electrodomestics/{id}', [\App\Http\Controllers\Api\ElectrodomesticsController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

