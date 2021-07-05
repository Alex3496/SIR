<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned();

            $table->string('economic')->nullable();
            $table->string('plates_us')->nullable();
            $table->string('plates_mx')->nullable();
            $table->string('state_us')->nullable();
            $table->string('state_mx')->nullable();
            $table->string('vin')->nullable();
            $table->string('trademark')->nullable();
            $table->string('model')->nullable();
            $table->string('estatus')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
