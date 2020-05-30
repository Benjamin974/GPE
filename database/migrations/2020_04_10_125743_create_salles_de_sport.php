<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSallesDeSport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salles_de_sport', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lieu');
            $table->string('horaire');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::table('salles_de_sport', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            $table->dropForeign(['id_user']);
            $table->dropIfExists('id_user');
            Schema::enableForeignKeyConstraints();
        });
        Schema::dropIfExists('salles_de_sport');
    }
}
