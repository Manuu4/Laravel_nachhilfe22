<?php

use App\Http\Controllers\AuthController;
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

/* protected Nur für Admins */
Route::group(['middleware' =>['api', 'auth.jwt']], function() {
    Route::post('lessons', [LessonController::class,'save']);
    Route::put('lessons/{id}', [LessonController::class,'update']);
    Route::delete('lessons/{id}', [LessonController::class,'delete']);
    Route::post('auth/logout', [AuthController::class,'logout']);
    Route::get('personalarea/{id}', [LessonController::class,'findLessonByTakerId']);
    Route::get('personalarea/lesson/{id}', [LessonController::class,'findProposalByLessonId']);
    Route::get('personalarea/user/{id}', [LessonController::class,'findProposalByUserId']);
//    Route::get('personalarea/{id}', [LessonController::class,'findLessonByHelperId']);
});

/* auth */
Route::post('auth/login', [AuthController::class,'login']);
//Route::post('auth/logout', [AuthController::class,'logout']);

Route::get('lessons', [LessonController::class,'index']);
Route::get('lessons/{id}', [LessonController::class,'findById']);
Route::get('lessons/checktitle/{title}', [LessonController::class,'checkLessonTitle']);
Route::get('lessons/checkid/{id}', [LessonController::class,'checkId']);
Route::get('lessons/search/{searchTerm}', [LessonController::class,'findBySearchTerm']);
Route::get('lessons/status/{status}', [LessonController::class,'findByStatus']);
Route::get('lessons/proposals/{id}', [LessonController::class,'findProposal']);

Route::get('courses', [LessonController::class,'indexCourses']);
//Route::get('courses/{id}', [LessonController::class,'findCourseById']);
Route::get('courses/{id}', [LessonController::class,'findLessonsByCourseId']);

//Route::post('lessons', [LessonController::class,'save']);
Route::post('proposals', [LessonController::class,'saveProposal']);

//Route::put('lessons/{id}', [LessonController::class,'update']);
Route::put('proposals/{id}', [LessonController::class,'updateProposal']);

//Route::delete('lessons/{id}', [LessonController::class,'delete']);
Route::delete('proposals/{id}', [LessonController::class,'deleteProposal']);

