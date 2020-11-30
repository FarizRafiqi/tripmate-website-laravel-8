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
        Schema::create('flight_ticket_payments', function (Blueprint $table) {
            $table->char('id', 6)->primary();
            $table->foreignId('flight_order_detail_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->decimal('fare_per_pax', 10, 2);
            $table->foreignId('payment_method_id')->constrained();
            $table->decimal('total_payment',10,2);
            $table->dateTime('pay_date');
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
        Schema::dropIfExists('flight_ticket_payments');
    }
}
