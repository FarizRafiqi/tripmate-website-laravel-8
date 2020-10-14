<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_orders', function (Blueprint $table) {
            $table->char('id', 5)->primary();
            $table->char('id_pelanggan', 6)->index();
            $table->enum('status', ['IN_CART', 'PENDING', 'SUCCESS', 'CANCEL']);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id')->on('users')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_orders');
    }
}
