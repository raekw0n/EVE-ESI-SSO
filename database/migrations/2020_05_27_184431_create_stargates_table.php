<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStargatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stargates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('system_id');
            $table->unsignedBigInteger('stargate_id')->unique();
            $table->string('name');
            $table->unsignedBigInteger('destination_stargate_id');
            $table->unsignedBigInteger('destination_system_id');
            $table->timestamps();
            $table->foreign('system_id')->references('system_id')->on('systems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stargates');
    }
}
