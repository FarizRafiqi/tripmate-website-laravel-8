<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flights', function(Blueprint $table){
            $table->integer("id_pesawat")->unsigned()->index()->change();
            $table->integer("id_bandara_asal")->unsigned()->index()->change();
            $table->integer("id_bandara_tujuan")->unsigned()->index()->change();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
