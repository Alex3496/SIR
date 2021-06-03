<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petitions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned();

            $table->string('origin');
            $table->string('origin_state')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('origin_address')->nullable();
            $table->string('complete_origin')->nullable();
            $table->string('destiny');
            $table->string('destiny_state')->nullable();
            $table->string('destiny_country')->nullable();
            $table->string('destiny_address')->nullable();
            $table->string('complete_destiny')->nullable();
            $table->integer('approx_weight')->nullable();
            $table->string('type_weight',7)->nullable();
            $table->string('po_reference')->nullable();
            $table->string('bill_landing')->nullable();
            $table->date('load_date')->nullable();
            $table->string('load_hour')->nullable();
            $table->string('type_equipment');
            $table->string('extra')->nullable();
            $table->boolean('available')->default(1);
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
        Schema::dropIfExists('petitions');
    }
}
