<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name_insurance')->nullable();
            $table->string('contact_name')->nullable();
            $table->boolean('general_liability_ins')->nullable();
            $table->boolean('commercial_general_liability')->nullable();
            $table->boolean('auto_liability')->nullable();
            $table->boolean('motor_truck_cargo')->nullable();
            $table->boolean('trailer_interchange')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurances');
    }
}
