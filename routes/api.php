<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;





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


//Route::apiresource('siswa', SiswaController::class);
//Route::apiresource('books', BookController::class);


// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('books', BookController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('siswa', SiswaController::class)->except('create', 'edit', 'show', 'index');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});