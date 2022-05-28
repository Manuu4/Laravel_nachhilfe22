<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

//    Attribute:
//    protected $fillable = [
//        'firstname', 'lastname', 'studies', 'helper', 'email', 'password',
//    ];

    public function run()
    {
        $user = new User;
        $user->firstname = "Manu";
        $user->lastname = "Strobel";
        $user->studies = "KWM";
        $user->helper = "helper";
        $user->email = "manu@gmail.com";
        $user->password = bcrypt('secret');
        $user->save();

        $user = new User;
        $user->firstname = "Marc";
        $user->lastname = "Strobel";
        $user->studies = "MTD";
        $user->helper = "student";
        $user->email = "marc@gmail.com";
        $user->password = bcrypt('secret');
        $user->save();

        $user = new User;
        $user->firstname = "Vanny";
        $user->lastname = "Maith";
        $user->studies = "MTD";
        $user->helper = "student";
        $user->email = "vanny@gmail.com";
        $user->password = bcrypt('secret');
        $user->save();

        $user = new User;
        $user->firstname = "Tommy";
        $user->lastname = "Sickinger";
        $user->studies = "HTD";
        $user->helper = "student";
        $user->email = "tommy@gmail.com";
        $user->password = bcrypt('secret');
        $user->save();
    }
}
