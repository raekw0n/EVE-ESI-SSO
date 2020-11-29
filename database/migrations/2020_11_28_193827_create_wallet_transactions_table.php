<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();

            $table->string('division_id')->references('division_id')->on('wallet_divisions');

            $table->string('transaction_id');
            $table->string('type_id');
            $table->string('client_id');

            $table->boolean('is_buy');

            $table->string('journal_ref_id')->references('journal_id')->on('wallet_journal');
            $table->string('location_id');

            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('unit_price');

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
        Schema::dropIfExists('wallet_transactions');
    }
}
