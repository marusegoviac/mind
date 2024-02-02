<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;

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

Route::group(['prefix' => 'auth'], function () {
  Route::post('login', [UserController::class, 'login']);
  Route::post('register', [UserController::class, 'register']);

  Route::group(['middleware' => 'auth:sanctum'], function() { //Pour accéder aux routes si on est logué
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('user', [UserController::class, 'user']);
    Route::resource('notes', NoteController::class); //Cette route "resource" contient toutes les routes nécessaries pour créer, lire, modifier et éfacer les notes.
    Route::resource('tasks', TaskController::class);
  });
});

