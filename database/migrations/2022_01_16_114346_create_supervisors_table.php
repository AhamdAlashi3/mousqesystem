<?php

use App\Models\City;
use App\Models\Teacher;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->enum('gender', ['M', 'F']);
            
            $table->softDeletes();

            $table->foreignIdFor(City::class);
            $table->foreign('city_id')->references('id')->on('cities');

            $table->foreignIdFor(Teacher::class);
            $table->foreign('teacher_id')->references('id')->on('teachers');

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
        Schema::dropIfExists('supervisors');
    }
}
