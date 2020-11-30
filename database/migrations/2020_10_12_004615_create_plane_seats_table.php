<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaneSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane_seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('plane_id')->index();
            $table->enum('class', ['ekonomi', 'premium ekonomi', 'bisnis', 'first']);
            $table->integer('row');
            $table->char('column', 1);
            $table->decimal('seat_pitch',4,0)->nullable(); //jarak kursi dengan kursi di depannya dalam satuan cm
            $table->enum('status', ['tersedia', 'dikonfirmasi']);
            $table->foreign('plane_id')->references('id')->on('planes')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plane_seats');
    }
}
