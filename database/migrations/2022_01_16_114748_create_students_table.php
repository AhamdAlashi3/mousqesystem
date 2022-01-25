<?php

use App\Models\City;
use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('Data_Of_Barth');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->enum('gender', ['M', 'F']);

            $table->foreignIdFor(City::class);
            $table->foreign('city_id')->on('Cities')->references('id');

            $table->foreignIdFor(Classes::class);
            $table->foreign('classes_id')->on('Classes')->references('id');

            $table->foreignIdFor(Teacher::class);
            $table->foreign('teacher_id')->on('Teachers')->references('id');


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
        Schema::dropIfExists('students');
    }
}
