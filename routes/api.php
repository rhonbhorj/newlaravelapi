<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\Login;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('students/{id}', [StudentController::class, 'show']);
Route::get('students/{id}/edit', [StudentController::class, 'edit']);
Route::put('students/{id}/edit', [StudentController::class, 'update']);
Route::delete('students/{id}/delete', [StudentController::class, 'destroy']);

Route::post('otp', [StudentController::class, 'otp']);

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::any('/', function (Request $request) {
    return response()->json([
        'status' => 401,
        'message' => 'Please check your API endpoint.a',
    ], 401);
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);


Route::any('/api', function (Request $request) {
    return response()->json([
        'status' => 401,
        'message' => 'Please check your API endpoint.api',
    ], 401);
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
  


Route::post('login', [Login::class, 'index']);
