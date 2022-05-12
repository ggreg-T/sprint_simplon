<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Treckers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treckers', function (Blueprint $table) {
            $table->id();
            $table->string('treckName');
            $table->bigInteger('treckId');
            $table->string('pseudo');
            $table->bigInteger('idUser');
            $table->date('dateTreck');
            $table->string('timeTreck');
            $table->string('timeTampon');
            $table->string('treckStart');
            $table->string('treckEnd');
            $table->string('treckEndLimit');
            $table->boolean('treckStandBy')->default(true);
            $table->boolean('endConfirmed')->default(false);
            $table->string('profil');
            $table->boolean('private');
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
