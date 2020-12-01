<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightFaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_fares', function (Blueprint $table) {
            $table->id();
            $table->char('flight_id', 7)->index();
            $table->decimal('price', 10, 2);
            $table->enum('category', ['dewasa', 'anak', 'bayi']);
            $table->foreign("flight_id")->references("id")->on("flights")->onUpdate('cascade');
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
        Schema::dropIfExists('flight_fares');
    }
}
