<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArtefactTypeTableCreation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('artefacttypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string("artefacttypecode")->unique();
            $table->integer("artefacttypepid")->nullable();
            $table->string("artefacttypedescription");
            $table->string("artefacticon")->nullable();
            $table->integer("sequencenumber")->nullable();
            $table->timestamps();

//            $table->string('firstname');
//            $table->string('middlename');
//            $table->string('lastname');
//            $table->integer("location");
//            $table->string("abhyasiid")->unique();
//            $table->string('email');
//            $table->string('password', 60);
//            $table->integer("login_attempts")->default(0);
//            $table->boolean("activestatus")->default(TRUE);
//            $table->rememberToken();
//            $table->timestamps();
//
//
//            $table->foreign('location')->references('id')->on('locations');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop("artefacttypes");
    }
}
