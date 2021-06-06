<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_key', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('key_id');
            $table->foreign('key_id')
                ->references('id')
                ->on('keys')
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('vehicle_key');
    }
}
