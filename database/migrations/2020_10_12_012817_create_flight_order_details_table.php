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
            $table->integer('flight_order_id')->index();
            $table->char('flight_id', 7)->index();
            $table->foreignId('passengger_id')->constrained();
            $table->foreignId('plane_seat_id')->constrained()->default(null)->nullable();
            $table->enum('category', ['departure', 'return']);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('flight_order_id')->references('id')->on('flight_orders');
            $table->foreign('flight_id')->references('id')->on('flights')->cascadeOnDelete();
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
