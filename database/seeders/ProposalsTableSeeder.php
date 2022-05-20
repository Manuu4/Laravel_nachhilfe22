<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProposalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Nehme bestehenden Nutzer (Nachhilfesuchender)
        $user2 = User::find(2);

        //Nehme bestehende Nachhilfeineheit
        $lesson3 = Lesson::find(3);


        //Nachhilfesuchender fragt neuen Termin für lesson3 an
        $proposal1 = new Proposal();
        $proposal1->message = "Kann da leider nicht. Geht der neue Termin auch?";
        $proposal1->time = date("2022-5-23 12:00:00");
        $proposal1->user()->associate($user2);
        $proposal1->lesson()->associate($lesson3);
        $proposal1->save();

        $proposal2 = new Proposal();
        $proposal2->message = "Eine ander möglichkeit wäre dieser Termin";
        $proposal2->time = date("2022-5-23 14:00:00");
        $proposal2->user()->associate($user2);
        $proposal2->lesson()->associate($lesson3);
        $proposal2->save();
    }
}
