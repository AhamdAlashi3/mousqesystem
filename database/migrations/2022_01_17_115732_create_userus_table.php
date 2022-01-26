<?php

use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userus', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('DoB');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->enum('gender', ['M', 'F']);

            $table->softDeletes();

            $table->foreignIdFor(City::class);
            $table->foreign('city_id')->references('id')->on('cities');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('userus');
    }
}
