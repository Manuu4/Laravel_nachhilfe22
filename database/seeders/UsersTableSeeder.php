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
        $user->helper = true;
        $user->email = "manu@gmail.com";
        $user->password = "123456";
        $user->save();

        $user = new User;
        $user->firstname = "Marc";
        $user->lastname = "Strobel";
        $user->studies = "MTD";
        $user->helper = false;
        $user->email = "marc@gmail.com";
        $user->password = "123456";
        $user->save();
    }
}
