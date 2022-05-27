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
Route::get('lessons/{id}', [LessonController::class,'findById']);
Route::get('lessons/checkid/{id}', [LessonController::class,'checkId']);
Route::get('lessons/search/{searchTerm}', [LessonController::class,'findBySearchTerm']);
Route::get('lessons/status/{status}', [LessonController::class,'findByStatus']);
Route::get('lessons/taken/{id}', [LessonController::class,'findLessonByTakerId']);
Route::get('lessons/given/{id}', [LessonController::class,'findLessonByHelperId']);
Route::get('lessons/proposals/{id}', [LessonController::class,'findProposal']);

Route::get('courses', [LessonController::class,'indexCourses']);
Route::get('courses/{id}', [LessonController::class,'findCourseById']);
Route::get('courses/{id}/lessons', [LessonController::class,'findLessonsByCourseId']);

Route::post('lessons', [LessonController::class,'save']);
Route::post('proposals', [LessonController::class,'saveProposal']);

Route::put('lessons/{id}', [LessonController::class,'update']);
Route::put('proposals/{id}', [LessonController::class,'updateProposal']);

Route::delete('lessons/{id}', [LessonController::class,'delete']);
Route::delete('proposals/{id}', [LessonController::class,'deleteProposal']);




