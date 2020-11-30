<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_details', function(Blueprint $table){
            $table->id();
            $table->char('flight_id', 7)->index();
            $table->unsignedBigInteger('facility_id')->index();
            $table->integer('weight');
            $table->integer('amount');
            $table->text('description');
            $table->foreign("facility_id")->references("id")->on("facilities")->onUpdate('cascade');
            $table->foreign("flight_id")->references("id")->on("flights")->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_details');
    }
}
