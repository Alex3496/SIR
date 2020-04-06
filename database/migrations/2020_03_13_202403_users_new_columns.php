<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersNewColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           
           $table->string('role');
            /*$table->string('last_name',250);
            $table->string('phone',15);
            $table->string('company_name');
            $table->string('company_address');
            $table->string('city');
            $table->string('zip_code',10);
            $table->string('country');
            $table->string('type_company_user');*/

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
            //

             $table->dropColumn('role');

            /*$table->dropColumn('last_name');
            $table->dropColumn('phone');
            $table->dropColumn('company_name');
            $table->dropColumn('company_address');
            $table->dropColumn('city');
            $table->dropColumn('zip_code');
            $table->dropColumn('country');
            $table->dropColumn('type_company_user');*/
        });
    }
}
