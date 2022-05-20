<?php

use App\Http\Controllers\LessonController;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LessonController::class, 'index']);
Route::get('/lessons/{lesson}', [LessonController::class, 'show']);

//Route::get('/courses/{id}', function ($id) {
////dd($isbn); //die and dump -> Hilfsfunktion von Laravel
//    $course = Course::find($id);
////dd($book);
//    return view('courses.show',compact('course'));
//});

