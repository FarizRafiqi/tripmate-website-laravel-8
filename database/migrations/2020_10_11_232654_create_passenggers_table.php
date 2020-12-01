<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassenggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenggers', function (Blueprint $table) {
            $table->id();
            $table->enum('title', ['tuan', 'nyonya', 'nona']);
            $table->string('full_name');
            $table->date('date_of_birth')->nullable();
            $table->enum('category', ['dewasa', 'anak', 'bayi']);
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
        Schema::dropIfExists('passenggers');
    }
}
