<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('timeslot1');
            $table->dateTime('timeslot2')->nullable();
            $table->dateTime('truetimeslot')->nullable();
            $table->string('status')->default('verfügbar');

            $table->bigInteger('course_id')->unsigned();

            //create constraint in db
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

//$i = new App\Model\Lesson(['title' => 'Uebung Mathe', 'description' => 'Uebung Mathe Nummer 1', 'timeslot1' => date("1996-8-9 5:4:2"), 'status' => 'Offen']);


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
