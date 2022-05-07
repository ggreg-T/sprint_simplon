<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trecks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trecks', function (Blueprint $table) {
            $table->id();
            $table->string('treckName')->unique();
            $table->bigInteger('idUser');
            $table->string('pseudo');
            $table->string('hardness');
            $table->string('time');
            $table->string('location');
            $table->string('coords');
            $table->string('profil');
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
        //
    }
}
