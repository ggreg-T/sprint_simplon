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
            $table->string('hardness')->nullable();
            $table->string('time')->nullable();
            $table->string('type');
            $table->string('distance');
            $table->string('location');
            $table->text('coords');
            $table->string('description');
            $table->string('profil');
            $table->string('img')->default('public/images/treckingsecurLogo.png');
            $table->boolean('private')->default(false);
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
