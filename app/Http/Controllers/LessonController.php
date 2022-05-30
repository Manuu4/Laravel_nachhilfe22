<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
//use http\Env\Response;
use App\Models\Proposal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{

    //Alle Lessons ausgeben
    public function index() : JsonResponse {
        $lessons = Lesson::with(['user', 'course', 'proposal'])->get();
//        return view('courses.index', compact('lessons'));
        return response()->json($lessons, 200);
    }

    //Lesson nach id heraussuchen
    public function findById(int $id) : Lesson{
        $lesson = Lesson::where('id', $id)->with(['user', 'course', 'proposal'])->first();
        return $lesson;
    }

    //boolean existiert Lesson nach id?
    public function checkId(int $id) {
        $lesson = Lesson::where('id', $id)->first();
        return $lesson != null ?
            response()->json(true, 200) :
            response()->json(false, 200);
    }

    //Lesson nach Status suchen
    public function findByStatus(string $status) {
        $lesson = Lesson::where('status', $status)->with(['user', 'course', 'proposal'])->get();
        return $lesson;
    }

    //Bestimmte Lesson ausspielen nach ID in URL .../lessons/ID
    public function show(Lesson $lesson){
//        $lesson = Lesson::find($lesson);
        return view('courses.show', compact('lesson'));
    }

    //Lesson nach Suchbegriff suchen
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

    //Zeit formatieren
    private function parseRequest(Request $request) : Request {

        $date = new \DateTime($request->timeslot1);
        $request['timeslot1'] = $date;
        $date2 = new \DateTime($request->timeslot2);
        $request['timeslot2'] = $date2;

        return $request;

    }

    //Lesson nach id löschen
    public function delete(int $id) : JsonResponse
    {
        $lesson = Lesson::where('id', $id)->first();
        if ($lesson != null) {
            $lesson->delete();
        }
        else
            throw new \Exception("lesson couldn't be deleted - it does not exist");
        return response()->json('lesson (' . $id . ') successfully deleted', 200);

    }



    //Lesson nach id updaten
    public function update(Request $request, int $id) : JsonResponse
    {

        DB::beginTransaction();
        try {
            $lesson = Lesson::with(['user', 'course', 'proposal'])
                ->where('id', $id)->first();
            if ($lesson != null) {
                $request = $this->parseRequest($request);
                $lesson->update($request->all());

                //proposals an- und ablehnen
                if (isset($request['proposal']) && is_array($request['proposal'])) {
                    foreach ($request['proposal'] as $prop) {
                        $pid = $prop['id'];
                        $proposal1 = Proposal::where('id', $pid)->first();
                        if ($proposal1 != null) {
                            $proposal1->update($prop);
                            $lesson->proposal()->save($proposal1);
                        }
                    }
                }

                $lesson->save();

            }
            DB::commit();
            $lesson1 = Lesson::with(['user', 'course', 'proposal'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($lesson1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating lesson failed: " . $e->getMessage(), 420);
        }
    }


    //Alle Kurse ausgeben
    public function indexCourses() : JsonResponse {
//        $courses = Course::get();
        $courses = Course::with('lessons')->get();
        return response()->json($courses, 200);
    }


    //Kurs nach id heraussuchen
//    public function findCourseById(int $id) : Course{
//        $course = Course::where('id', $id)->with('lessons')->first();
//        return $course;
//    }


    //Anfragen nach Taker nehmen
    public function findLessonByTakerId(int $id) {
        $lessons = Lesson::where('taker', $id)->orWhere('user_id', $id)->get();
        return $lessons;
    }

    //Lessons nach Ersteller nehmen
//    public function findLessonByHelperId(int $id) {
//        $lessons = Lesson::where('user_id', $id)->get();
//        return $lessons;
//    }


    //Anfragen nach Lessons finden
    public function findProposal(int $id) {
        $proposal = Proposal::where('lesson_id', $id)->with('user')->get();
        return $proposal;
    }

    //Proposal nach id updaten
    public function updateProposal(Request $request, int $id) : JsonResponse
    {

        DB::beginTransaction();
        try {
            $proposal = Proposal::with(['user', 'lesson'])
                ->where('id', $id)->first();
            if ($proposal != null) {
                $request = $this->parseRequest($request);
                $proposal->update($request->all());
                $proposal->save();

            }
            DB::commit();
            $proposal1 = Proposal::with(['user', 'lesson'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($proposal1, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating proposal failed: " . $e->getMessage(), 420);
        }
    }

    //Proposal nach id löschen erstellen
    public function deleteProposal(int $id) : JsonResponse
    {
        $proposal = Proposal::where('id', $id)->first();
        if ($proposal != null) {
            $proposal->delete();
        }
        else
            throw new \Exception("proposal couldn't be deleted - it does not exist");
        return response()->json('proposal (' . $id . ') successfully deleted', 200);

    }

    //Neue Anfrage erstellen
    public function saveProposal (Request $request) : JsonResponse {
        $request = $this->parseRequest($request);
        DB::beginTransaction();
        try {
            $proposal = Proposal::create($request->all());
            DB::commit();
            return response()->json($proposal, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json("saving proposal failed: " . $e->getMessage(), 420);
        }
    }

    //Lessons nach Kursen finden
    public function findLessonsByCourseId(int $id) {
        $lessons = Lesson::where('course_id', $id)->get();
        return $lessons;
    }

    //Lessons nach Title checken
    public function checkLessonTitle(int $title) {
        $lesson = Lesson::where('title', $title)->get();
        return $lesson;
    }



}


