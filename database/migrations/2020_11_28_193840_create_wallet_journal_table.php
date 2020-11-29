<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_journal', function (Blueprint $table) {
            $table->id();

            $table->string('division_id')->references('division_id')->on('wallet_divisions');
            $table->string('journal_id');
            $table->string('ref_type');
            $table->string('description');
            $table->string('amount');
            $table->string('balance');

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
        Schema::dropIfExists('wallet_journal');
    }
}
