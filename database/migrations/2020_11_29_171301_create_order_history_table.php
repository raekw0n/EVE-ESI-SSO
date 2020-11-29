<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_history', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('region_id');
            $table->string('location_id');
            $table->string('type_id');
            $table->boolean('is_buy_order');
            $table->string('price');
            $table->string('escrow');
            $table->string('volume_min');
            $table->string('volume_total');
            $table->string('volume_remain');
            $table->string('state');
            $table->string('issued_by');
            $table->string('wallet_division')->references('division_id')->on('wallet_divisions');
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
        Schema::dropIfExists('order_history');
    }
}
