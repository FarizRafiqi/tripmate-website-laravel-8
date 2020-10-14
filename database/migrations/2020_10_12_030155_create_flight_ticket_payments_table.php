<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightTicketPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('flight_ticket_payments');
        Schema::create('flight_ticket_payments', function (Blueprint $table) {
            $table->char('id', 6)->primary();
            $table->unsignedBigInteger('id_pemesanan_detail')->index();
            $table->unsignedBigInteger('id_operator')->index();
            $table->decimal('tarif_per_penumpang', 10, 2);
            $table->unsignedBigInteger('id_metode_pembayaran')->index();
            $table->decimal('total_bayar',10,2);
            $table->softDeletes();
            $table->dateTime('tanggal_bayar');
            $table->timestamps();
            $table->foreign('id_pemesanan_detail')->references('id')->on('flight_order_details');
            $table->foreign('id_operator')->references('id')->on('users')->cascadeOnUpdate();
            $table->foreign('id_metode_pembayaran')->references('id')->on('payment_methods')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_ticket_payments');
    }
}
