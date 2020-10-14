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
            $table->char('id_penerbangan', 7)->index();
            $table->decimal('harga', 10, 2);
            $table->unsignedBigInteger('id_fasilitas')->index();
            $table->foreign("id_fasilitas")->references("id")->on("facilities")->onUpdate('cascade');
            $table->foreign("id_penerbangan")->references("id")->on("flights")->onUpdate('cascade');
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
