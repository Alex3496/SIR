<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_datasets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('dba_name')->nullable();
            $table->string('scac_code')->nullable();
            $table->string('caat')->nullable();
            $table->string('mc_number')->nullable();
            $table->integer('num_trucks')->nullable();
            $table->string('certificate_ctpat')->nullable();
            $table->string('certificate_oae')->nullable();
            $table->string('fast')->nullable();
            $table->string('warehouse')->nullable();
            $table->string('fiscal_warehouse')->nullable();
            $table->string('position')->nullable();
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
        Schema::dropIfExists('company_datasets');
    }
}
