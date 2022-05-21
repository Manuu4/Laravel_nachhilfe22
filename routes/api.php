<?php

use App\Http\Controllers\LessonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('lessons', [LessonController::class,'index']);
Route::get('lessons/status/{status}', [LessonController::class,'findByStatus']);
Route::post('lessons', [LessonController::class,'save']);
Route::get('lessons/{id}', [LessonController::class,'findById']);
Route::put('lessons/{id}', [LessonController::class,'update']);
Route::delete('lessons/{id}', [LessonController::class,'delete']);
Route::get('lessons/checkid/{id}', [LessonController::class,'checkId']);
Route::get('lessons/search/{searchTerm}', [LessonController::class,'findBySearchTerm']);
