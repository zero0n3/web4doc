<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('athlete_company2s', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->unsignedBigInteger('athlete_id')->unsigned();
            $table->unsignedBigInteger('company_id')->unsigned();
            $table->unsignedBigInteger('sport_id')->unsigned();
            $table->foreign('athlete_id')->references('id')->on('athlete2s')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('company2s')->onDelete('cascade');
            $table->foreign('sport_id')->references('id')->on('sport2s')->onDelete('cascade');
            //$table->primary(['athlete_id', 'company_id']);
            $table->unique(['athlete_id', 'sport_id']);
            $table->timestamps();
            $table->softDeletes();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athlete_sport_company2s');
    }
}
