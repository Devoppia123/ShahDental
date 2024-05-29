<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api', [ApiController::class, 'ApiDataInsert']);

Route::post('/regiser_patient', [ApiController::class, 'register_patient']);

Route::get('/confirmation_email/{patient_id}', [ApiController::class, 'confirmation_email']);

Route::get('/all_patients', [ApiController::class, 'all_patients']);

Route::get('/new_patients', [ApiController::class, 'new_patients']);

Route::get('doctors', [ApiController::class, 'doctors']);
