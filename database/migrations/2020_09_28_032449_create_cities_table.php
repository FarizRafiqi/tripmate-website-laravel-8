<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $provinces = ['Nanggroe Aceh Darusalam', 'Bali', 'Bangka Belitung', 'Banten', 'Bengkulu', 'Daerah Istimewa Yogyakarta', 'Daerah Khusus Ibukota Jakarta', 'Gorontalo', 'Jambi', 'Jawa Barat', 'Jawa Tengah', 'Jawa Timur', 'Kalimantan Barat', 'Kalimantan Tengah', 'Kalimantan Timur', 'Kalimatan Utara', 'Kalimantan Selatan', 'Kepulauan Riau', 'Lampung', 'Maluku', 'Maluku Utara', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Papua', 'Papua Barat', 'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tengah','Sulawesi Tenggara','Sulawesi Utara','Sumatra Barat','Sumatra Selatan', 'Sumatra Utara'];
            $table->increments('id');
            $table->string("name", 50);
            $table->enum("province", $provinces);
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
        Schema::dropIfExists('cities');
    }
}
