<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stays', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned();

            $table->string('check_in')->nullable();
            $table->string('check_in_hours')->nullable();
            $table->string('check_in_minutes')->nullable();
            $table->string('free_hours')->nullable();
            $table->string('check_out')->nullable();
            $table->string('check_out_hours')->nullable();
            $table->string('check_out_minutes')->nullable();
            $table->string('type')->nullable();
            $table->string('cost')->nullable();
            $table->string('cost_type')->nullable();
            $table->string('cost_currency')->nullable();
            $table->string('company')->nullable();
            $table->string('unity')->nullable();
            $table->string('operator')->nullable();
            $table->string('client')->nullable();
            $table->string('direction')->nullable();
            $table->string('payment_operator')->nullable();
            $table->string('customer_charge')->nullable();
            
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
        Schema::dropIfExists('stays');
    }
}
