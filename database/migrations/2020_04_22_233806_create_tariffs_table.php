<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('type_tariff'); 
            $table->string('origin');
            $table->string('destiny');
            //$table->date('date');
            $table->integer('max_weight')->nullable();
            $table->integer('min_weight')->nullable();
            $table->string('type_weight',7)->nullable();
            $table->integer('distance')->nullable();
            $table->string('type_equipment');
            $table->decimal('rate',9,2);
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
        Schema::dropIfExists('tariffs');
    }
}
