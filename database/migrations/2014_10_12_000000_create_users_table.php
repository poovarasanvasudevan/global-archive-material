<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->integer("location");
            $table->string("abhyasiid")->unique();
            $table->string('email');
            $table->string('password', 60);
            $table->string('image')->default("uploads/profilepic/default.jpg");
            $table->text('address')->nullable();
            $table->string('mobile')->nullable();
            $table->text('quotes')->default("We have to allow ourselves to be loved by the people who really love us, the people who really matter. Too much of the time, we are blinded by our own pursuits of people to love us, people that do not even matter, while all that time we waste and the people who do love us have to stand on the sidewalk and watch us beg in the streets! Its time to put an end to this. Its time for us to let ourselves be loved.");
            $table->integer("login_attempts")->default(0);
            $table->boolean("activestatus")->default(TRUE);
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('location')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
