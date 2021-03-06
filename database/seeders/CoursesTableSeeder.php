<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Proposal;
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
