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
            $table->timestamp('date_issued')->nullable();
            $table->timestamp('date_accepted')->nullable();
            $table->timestamp('date_completed')->nullable();
            $table->string('start_location_id');
            $table->string('end_location_id');
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
