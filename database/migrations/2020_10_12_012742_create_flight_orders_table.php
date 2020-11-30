<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->integer('id', 9);
            $table->foreignId('user_id')->constrained();
            $table->enum('status', ['IN_CART', 'PENDING', 'SUCCESS', 'CANCEL']);
            $table->softDeletes();
            $table->timestamps();
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
