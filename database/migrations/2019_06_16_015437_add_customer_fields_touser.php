<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerFieldsTouser extends Migration
{
    /**
     * Run the migrations.
     *
     * THE USER MIGRATION IS USE TO SET CUSTOMER DATA
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            //WE NEED TO DELETE THE COLUMN 'name' AND REPLACE IT WITH WITH firstname AND lastname.
            if(Schema::hasColumn('users','name')){
                $table->dropColumn('name');
            }
            $table->string('first_name');
            $table->string('last_name');
            $table->mediumText('address');
            $table->mediumText('city');
            $table->mediumText('country');
            $table->mediumText('phone')->nullable(true)->default(null);
            $table->mediumText('fax')->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            if(!Schema::hasColumn('users','name')){
                $table->string('name');
            }
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('phone');
            $table->dropColumn('fax');
        });
    }
}
