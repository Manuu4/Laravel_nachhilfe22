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

        //Nehme Kurs (Fachrichtung)
        $course1 = Course::find(1);

        //Erstelle Nachhilfestunden (Einheiten) und füge User entsprechend hinzu
        $lesson1 = new Lesson();
        $lesson1->title = "Coole Übung";
        $lesson1->description = "Wir frischen Komm. auf!";
        $lesson1->timeslot1 = date("2022-5-21 13:00:00");
        $lesson1->user()->associate($user1);

        $lesson2 = new Lesson();
        $lesson2->title = "Lernen macht Spaß";
        $lesson2->description = "APA leicht erklärt";
        $lesson2->timeslot1 = date("2022-5-22 18:00:00");
        $lesson2->timeslot2 = date("2022-5-22 20:30:00");
        $lesson2->user()->associate($user1);

        $lesson3 = new Lesson();
        $lesson3->title = "Heute werden wir schlauer";
        $lesson3->description = "Wir lernen zusammen etwas über APA";
        $lesson3->taker = 2;
        $lesson3->timeslot1 = date("2022-5-22 16:30:00");
        $lesson3->timeslot2 = date("2022-5-22 11:15:00");
        $lesson3->user()->associate($user1);

        //Speichere Einheiten ab und weiße diese den Kursen zu
        $course1->lessons()->saveMany([$lesson1, $lesson2, $lesson3]);
        $course1->save();
    }
}
