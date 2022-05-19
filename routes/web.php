<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
//use App\Models\Kurs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $kurse = DB::table('kurse')->get();
    //return $kurse;
    return view('welcome',compact('kurse'));
});

Route::get('/kurse', function () {
    $kurse = DB::table('kurse')->get();
    return view('kurse.index',compact('kurse'));
});

Route::get('/kurse/{id}', function ($id) {
//dd($isbn); //die and dump -> Hilfsfunktion von Laravel
    $kurs = DB::table('kurse')->find($id);
//dd($book);
    return view('kurse.show',compact('kurs'));
});

