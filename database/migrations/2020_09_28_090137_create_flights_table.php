<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->char("id", 7)->primary();
            $table->integer("plane_id")->unsigned()->index();
            $table->integer("departure_airport_id")->unsigned()->index();
            $table->integer("arrival_airport_id")->unsigned()->index();
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->float("velocity_avg")->nullable();
            $table->float("trip_distance")->nullable();
            $table->enum("class", ['ekonomi', 'premium ekonomi', 'bisnis', 'first']);
            $table->foreign("plane_id")->references("id")->on("planes")->cascadeOnUpdate();
            $table->foreign("departure_airport_id")->references("id")->on("airports")->cascadeOnUpdate();
            $table->foreign("arrival_airport_id")->references("id")->on("airports")->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
