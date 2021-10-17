<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('type_company_user'); // enum : Shipper,Carriers,Broker
            $table->string('company_name');
            $table->string('position');
            $table->string('phone',16);
            $table->string('usdot')->nullable();
            $table->string('mc_mx')->nullable();

            $table->string('company_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code',10)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('type_company_user');
            $table->dropColumn('company_name');
            $table->dropColumn('position');
            $table->dropColumn('phone');

            $table->dropColumn('company_address');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('zip_code');
        });
    }
}
