<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientHasProgrammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_has_programme', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_client')->unsigned();
            $table->bigInteger('id_programme')->unsigned();

            $table->foreign('id_client')->references('id')->on('users');
            $table->foreign('id_programme')->references('id')->on('programmes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_has_programme');
    }
}
