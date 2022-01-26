<?php

use App\Models\City;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Surah;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_notes', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignIdFor(Student::class);
            $table->foreign('student_id')->references('id')->on('Students');

            $table->foreignIdFor(City::class);
            $table->foreign('city_id')->references('id')->on('cities');

            $table->foreignIdFor(Classes::class);
            $table->foreign('classes_id')->on('Classes')->references('id');

            $table->foreignIdFor(Surah::class);
            $table->foreign('surah_id')->on('surahs')->references('id');

            // $table->string('Surah_name');
            $table->string('From_Quranic_verse');
            $table->string('to_Quranic_verse');

            $table->string('name_of_the_revised_surah');
            $table->string('From_Quranic_verse_revised');
            $table->string('to_Quranic_verse_revised');

            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_notes');
    }
}
