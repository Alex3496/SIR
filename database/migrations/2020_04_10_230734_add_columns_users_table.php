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
            //$table->string('last_name',250)->nullable();
            $table->string('phone',16);
            $table->string('company_name');
            $table->string('company_address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code',10)->nullable();
            $table->string('type_company_user');
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

            //$table->dropColumn('last_name');
            $table->dropColumn('phone');
            $table->dropColumn('company_name');
            $table->dropColumn('company_address');
            $table->dropColumn('city');
            $table->dropColumn('zip_code');
            $table->dropColumn('country');
            $table->dropColumn('type_company_user');
        });
    }
}
