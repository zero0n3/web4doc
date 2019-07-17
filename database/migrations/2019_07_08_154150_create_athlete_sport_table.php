<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteSportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_sport', function (Blueprint $table) {
            $table->bigIncrements('id');
            //
            $table->unsignedBigInteger('athlete_id')->unsigned();
            $table->unsignedBigInteger('sport_id')->unsigned();
            $table->unsignedBigInteger('team_id')->unsigned();
            //
            $table->foreign('athlete_id')->references('id')->on('athletes')->onDelete('cascade');
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            //
            $table->unique(['athlete_id', 'sport_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athlete_sport');
    }
}
