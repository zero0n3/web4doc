<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athletes', function (Blueprint $table) {
            $table->bigIncrements('id');
            //name - status - companyID
            $table->string('name');
            $table->date('dob');
            $table->char('sex', 1);
            $table->integer('status')->unsigned();
            //$table->integer('company_id')->unsigned();
            $table->unsignedBigInteger('company_id');
            //$table->foreign('company_id')->on('company')->references('id')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companys')->onDelete('cascade');
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
        Schema::dropIfExists('athletes');
    }
}
