<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SiswaController;





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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('halo', function(){
    return ["me" => "Cuantik"];
});
// Route::get('hal', [HeloController::class, 'index']);

// Route::get('siswa', [SiswaController::class, 'index']);
// Route::get('siswa/{id}', [SiswaController::class, 'show']);
// Route::post('siswa', [SiswaController::class, 'store']);
// Route::post('siswa/{id}', [SiswaController::class, 'update']);
// Route::get('siswa', [SiswaController::class, 'destroy']);


Route::apiresource('siswa', SiswaController::class);
Route::apiresource('books', BookController::class);
