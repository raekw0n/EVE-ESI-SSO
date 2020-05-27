<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('constellation_id');
            $table->unsignedBigInteger('system_id')->unique();
            $table->string('name');
            $table->string('security_class')->nullable();
            $table->string('security_status');
            $table->timestamps();
            $table->foreign('constellation_id')->references('constellation_id')->on('constellations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}
