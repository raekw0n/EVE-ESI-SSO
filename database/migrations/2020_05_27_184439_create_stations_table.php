<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('system_id');
            $table->unsignedBigInteger('station_id')->unique();
            $table->string('name');
            $table->float('max_dock_ship_volume');
            $table->float('reprocessing_station_efficiency')->nullable();
            $table->float('reprocessing_station_tax')->nullable();
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
        Schema::dropIfExists('stations');
    }
}
