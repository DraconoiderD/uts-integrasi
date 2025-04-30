<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', [UserController::class, 'index']);         // Get all users
Route::get('/users/{id}', [UserController::class, 'show']);     // Get user by ID
Route::post('/users', [UserController::class, 'store']);        // Create user
Route::put('/users/{id}', [UserController::class, 'update']);   // Update user
Route::delete('/users/{id}', [UserController::class, 'destroy']);// Delete user
