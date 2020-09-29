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
            $table->integer("id_pesawat")->unsigned()->unique();
            $table->integer("id_bandara_asal")->unsigned()->unique();
            $table->integer("id_bandara_tujuan")->unsigned()->unique();
            $table->time("durasi");
            $table->dateTime('waktu_berangkat');
            $table->dateTime('waktu_tiba');
            $table->float("kecepatan_rata_rata")->nullable();
            $table->float("jarak_perjalanan")->nullable();
            $table->foreign("id_pesawat")->references("id")->on("planes")->cascadeOnUpdate();
            $table->foreign("id_bandara_asal")->references("id")->on("airports")->cascadeOnUpdate();
            $table->foreign("id_bandara_tujuan")->references("id")->on("airports")->cascadeOnUpdate();
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
