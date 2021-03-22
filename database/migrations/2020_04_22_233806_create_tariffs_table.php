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

            $table->string('type_tariff',30); // enum : TRUCK,TRAIN,MARITIME,AERIAL
            $table->string('origin');
            $table->string('origin_state')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('destiny');
            $table->string('destiny_state')->nullable();
            $table->string('destiny_country')->nullable();
            $table->integer('approx_weight')->nullable();
            $table->string('type_weight',7)->nullable();
            $table->integer('distance')->nullable();
            $table->string('type_equipment');
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->integer('length')->nullable();
            $table->string('extra')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('rate',9,2);
            $table->string('currency');

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
        Schema::dropIfExists('tariffs');
    }
}
