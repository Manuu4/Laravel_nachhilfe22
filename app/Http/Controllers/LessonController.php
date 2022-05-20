<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function index() : JsonResponse {
        $lessons = Lesson::with(['user', 'course'])->get();
//        return view('courses.index', compact('lessons'));
        return response()->json($lessons, 200);
    }

    public function findById(int $id) : Lesson{
        $lesson = Lesson::where('id', $id)->with(['user', 'course'])->first();
        return $lesson;
    }

    public function show(Lesson $lesson){
//        $lesson = Lesson::find($lesson);
//        return view('courses.show', compact('lesson'));
    }
}
