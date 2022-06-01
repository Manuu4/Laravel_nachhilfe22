<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Nehme Nutzer (Nachhilfegeber)
        $user1 = User::find(1);
        $user2 = User::find(2);

        //Nehme Kurs (Fachrichtung)
        $course1 = Course::find(1);
        $course2 = Course::find(2);

        //Erstelle Nachhilfestunden (Einheiten) und füge User entsprechend hinzu
        $lesson1 = new Lesson();
        $lesson1->title = "Coole Übung";
        $lesson1->description = "Hier steht diesmal eine längere Beschreibung um auszutesten, wie das ganze im Frontend aussieht. Auserdem sehen wir uns Mathe an.";
        $lesson1->timeslot1 = new \DateTime("2022-05-22UTC15:00");
        $lesson1->timeslot2 = new \DateTime("2022-05-22UTC17:00");
        $lesson1->user()->associate($user1);

        $lesson2 = new Lesson();
        $lesson2->title = "Lernen macht Spaß";
        $lesson2->description = "APA leicht erklärt";
        $lesson2->timeslot1 = new \DateTime("2022-05-22UTC12:00");
        $lesson2->timeslot2 = new \DateTime("2022-05-22UTC11:00");
        $lesson2->user()->associate($user1);

        $lesson3 = new Lesson();
        $lesson3->title = "Heute werden wir schlauer";
        $lesson3->description = "Wir lernen zusammen etwas über APA";
        $lesson3->taker = 3;
        $lesson3->timeslot1 = new \DateTime("2022-05-22UTC15:00");
        $lesson3->timeslot2 = new \DateTime("2022-05-22UTC18:00");
        $lesson3->user()->associate($user2);

        $lesson4 = new Lesson();
        $lesson4->title = "Vierte Lesson";
        $lesson4->description = "ABCDEFG";
        $lesson4->taker = 3;
        $lesson4->timeslot1 = new \DateTime("2022-05-22UTC15:00");
        $lesson4->timeslot2 = new \DateTime("2022-05-22UTC17:00");
        $lesson4->user()->associate($user2);

        //Speichere Einheiten ab und weiße diese den Kursen zu
        $course1->lessons()->saveMany([$lesson1, $lesson2]);
        $course2->lessons()->saveMany([$lesson3, $lesson4]);
        $course1->save();
        $course2->save();
    }
}
