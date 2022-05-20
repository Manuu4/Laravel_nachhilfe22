<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Faker\Provider\DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Erstelle Kurse (Fachrichtungen)
        $course1 = new Course;
        $course1->name = "Kommunikationsmanagement";
        $course1->description = "Die Lehrveranstaltung besteht aus einer Vorlesung und einer Übung. Sie bietet eine Einführung in das Kommunikationsmanagement im Sinne der Planung, Koordinierung, Durchführung und Auswertung interner und externer Kommunikationsprozesse. Die Studierenden lernen eine Analyse der Ist-Situation durchzuführen, Kommunikationsziele zu definieren, Zielgruppen zu identifizieren, Kernbotschaften zu erarbeiten und darauf abgestimmte Kommunikationsmaßnahmen zu konzipieren. Zudem kennen sie wichtige Methoden der Evaluierung von Kommunikationsaktivitäten und wissen, wie man im Krisenfall richtig kommuniziert.";
        $course1->semester = 4;
        $course1->save();

        $course2 = new Course;
        $course2->name = "Adaptivität und Personalisierung";
        $course2->description = "This course deals with adaptivity and personalization. The following topics are covered:
                - Basics of Adaptive Systems
                - User Modeling
                - Example Domains (e.g., personalized search, user modeling for personalized interaction)
                - Privacy and Security in Adaptive Systems
                - Recommender Systems
                - Data analysis for Adaptive Systems
                - Evaluation of Adaptive Systems";
        $course2->semester = 6;

        //Speichere Kurse (Fachrichtungen)
        $course2->save();

        //Erstelle Nutzer (Nachhilfegeber)
        $user = User::all()->first();

        //Erstelle Nachhilfestunden (Einheiten) und füge User entsprechend hinzu
        $lesson1 = new Lesson();
        $lesson1->title = "Coole Übung";
        $lesson1->description = "Wir frischen Komm. auf!";
        $lesson1->timeslot1 = date("2022-5-21 13:00:00");
        $lesson1->user()->associate($user);

        $lesson2 = new Lesson();
        $lesson2->title = "Lernen macht Spaß";
        $lesson2->description = "APA leicht erklärt";
        $lesson2->timeslot1 = date("2022-5-22 18:00:00");
        $lesson2->timeslot2 = date("2022-5-22 20:30:00");
        $lesson2->user()->associate($user);

        $lesson3 = new Lesson();
        $lesson3->title = "Heute werden wir schlauer";
        $lesson3->description = "Wir lernen zusammen etwas über APA";
        $lesson3->timeslot1 = date("2022-5-22 16:30:00");
        $lesson3->timeslot2 = date("2022-5-22 11:15:00");
        $lesson3->user()->associate($user);

        //Speichere Einheiten ab und weiße diese den Kursen zu
        $course1->lessons()->saveMany([$lesson1, $lesson2, $lesson3]);
        $course1->save();








        //$c = App\Models\Course::find(1);



//        DB::table('courses')->insert([
//            'name' => 'Kommunikationsmanagement',
//            'description' => 'Die Lehrveranstaltung besteht aus einer Vorlesung und einer Übung. Sie bietet eine Einführung in das Kommunikationsmanagement im Sinne der Planung, Koordinierung, Durchführung und Auswertung interner und externer Kommunikationsprozesse. Die Studierenden lernen eine Analyse der Ist-Situation durchzuführen, Kommunikationsziele zu definieren, Zielgruppen zu identifizieren, Kernbotschaften zu erarbeiten und darauf abgestimmte Kommunikationsmaßnahmen zu konzipieren. Zudem kennen sie wichtige Methoden der Evaluierung von Kommunikationsaktivitäten und wissen, wie man im Krisenfall richtig kommuniziert.',
//            'semester' => 4,
//            'created_at' => date("Y-m-d H:i:s"),
//            'updated_at' => date("Y-m-d H:i:s")
//        ]);
//        DB::table('courses')->insert([
//            'name' => 'Adaptivität und Personalisierung',
//            'description' => 'This course deals with adaptivity and personalization. The following topics are covered:
//                - Basics of Adaptive Systems
//                - User Modeling
//                - Example Domains (e.g., personalized search, user modeling for personalized interaction)
//                - Privacy and Security in Adaptive Systems
//                - Recommender Systems
//                - Data analysis for Adaptive Systems
//                - Evaluation of Adaptive Systems',
//            'semester' => 6,
//            'created_at' => date("Y-m-d H:i:s"),
//            'updated_at' => date("Y-m-d H:i:s")
//        ]);
    }
}
