<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('esi_contract_id');
            $table->string('volume');
            $table->string('type');
            $table->string('availability');

            $table->integer('days_to_complete')->nullable();
            $table->unsignedBigInteger('issuer_id');
            $table->unsignedBigInteger('reward')->default(0);
            $table->unsignedBigInteger('collateral')->default(0);
            $table->unsignedBigInteger('start_location_id')->default(0);
            $table->unsignedBigInteger('end_location_id')->default(0);

            $table->timestamp('date_expires')->nullable();
            $table->timestamp('date_issued')->nullable();
            $table->timestamp('date_accepted')->nullable();
            $table->timestamp('date_completed')->nullable();

            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
