<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->double('height');
            $table->double('weight');
            $table->double('triceps_R');
            $table->double('triceps_L');
            $table->double('chest_R');
            $table->double('chest_L');
            $table->integer('status')->unsigned();
            $table->unsignedBigInteger('athlete_id');
            $table->foreign('athlete_id')->references('id')->on('athletes')->onDelete('cascade');
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
        Schema::dropIfExists('checkups');
    }
}
