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
            $table->double('altezza');
            $table->double('peso');
            $table->double('tricipite_R');
            $table->double('tricipite_L');
            $table->double('petto_R');
            $table->double('petto_L');
            $table->double('ascella_R');
            $table->double('ascella_L');
            $table->double('iliaca_R');
            $table->double('iliaca_L');
            $table->double('addominale_R');
            $table->double('addominale_L');
            $table->double('coscia_R');
            $table->double('coscia_L');
            $table->double('spalle');
            $table->double('petto');
            $table->double('anche');
            $table->double('braccio_R');
            $table->double('braccio_L');
            $table->double('gamba_R');
            $table->double('gamba_L');
            $table->double('spirometria');
            $table->double('massa_grassa');
            $table->double('bmi');
            $table->integer('frq_riposo');
            $table->integer('frq_stress');
            $table->integer('frq_1min');
            $table->integer('step1');
            $table->integer('step2');
            $table->integer('step3');
            $table->integer('status')->unsigned();
            $table->unsignedBigInteger('athlete_id');
            $table->foreign('athlete_id')->references('id')->on('athletes')->onDelete('cascade');
            //nuova versione agosto 2019
            $table->string('team');
            $table->string('sport');
            //$table->unsignedBigInteger('team_id');
            //$table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            //$table->unsignedBigInteger('sport_id');
            //$table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            // fine
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
