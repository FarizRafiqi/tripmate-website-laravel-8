<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_order_details', function (Blueprint $table) {
            $table->id();
            $table->char('id_pemesanan', 5)->index();
            $table->char('id_penerbangan', 7)->index();
            $table->unsignedBigInteger('id_penumpang')->index();
            $table->unsignedBigInteger('id_kursi')->index()->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('id_pemesanan')->references('id')->on('flight_orders');
            $table->foreign('id_penerbangan')->references('id')->on('flights')->cascadeOnDelete();
            $table->foreign('id_penumpang')->references('id')->on('passengers');
            $table->foreign('id_kursi')->references('id')->on('plane_seats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_order_details');
    }
}
