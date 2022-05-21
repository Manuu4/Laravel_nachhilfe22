<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
//use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function index() : JsonResponse {
        $lessons = Lesson::with(['user', 'course', 'proposal'])->get();
//        return view('courses.index', compact('lessons'));
        return response()->json($lessons, 200);
    }

    public function findById(int $id) : Lesson{
        $lesson = Lesson::where('id', $id)->with(['user', 'course', 'proposal'])->first();
        return $lesson;
    }

    public function checkId(int $id) {
        $lesson = Lesson::where('id', $id)->first();
        return $lesson != null ?
            response()->json(true, 200) :
            response()->json(false, 200);
    }

    public function findByStatus(string $status) {
        $lesson = Lesson::where('status', $status)->with(['user', 'course', 'proposal'])->get();
        return $lesson;
    }

    public function show(Lesson $lesson){
//        $lesson = Lesson::find($lesson);
//        return view('courses.show', compact('lesson'));
    }

    /**
     * find book by search term
     * SQL injection is prevented by default, because Eloquent
     * uses PDO parameter binding
     */
    public function findBySearchTerm(string $searchTerm) {
        $lesson = Lesson::with(['user', 'course', 'proposal'])
            ->where('title', 'LIKE', '%' . $searchTerm. '%')
            ->orWhere('description' , 'LIKE', '%' . $searchTerm. '%')

            /* search term in course name */
            ->orWhereHas('course', function($query) use ($searchTerm) {
                $query->where('name', 'LIKE', '%' . $searchTerm . '%');
            })

            /* search term in users name */
            ->orWhereHas('user', function($query) use ($searchTerm) {
                $query->where('firstname', 'LIKE', '%' . $searchTerm. '%')
                    ->orWhere('lastname', 'LIKE',  '%' . $searchTerm. '%');
            })->get();
        return $lesson;
    }

    //Neue Lerneinheit erstellen
    public function save (Request $request) : JsonResponse {
        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $lesson = Lesson::create($request->all());
            DB::commit();
            return response()->json($lesson, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("saving lesson failed: " . $e->getMessage(), 420);
        }


    }


    private function parseRequest(Request $request) : Request {

        $date = new \DateTime($request->timeslot1);
        $request['timeslot1'] = $date;
        $date2 = new \DateTime($request->timeslot2);
        $request['timeslot2'] = $date2;

        return $request;

    }
}


