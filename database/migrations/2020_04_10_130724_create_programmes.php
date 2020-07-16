<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_salle_de_sport');
            $table->foreign('id_salle_de_sport')->references('id')->on('salles_de_sport');
            $table->unsignedBigInteger('id_seance');
            $table->foreign('id_seance')->references('id')->on('seances');
            $table->string('name');
            $table->string('difficulte');
            $table->string('nbre_seance_semaine');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('programmes');
        Schema::enableForeignKeyConstraints();
    }
}
