<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCustomerFieldsFromUsers extends Migration
{
    /**
     * Run the migrations.
     * We assumed at first the customer are user thus should be in the same db
     * after checking the instructions we noticed they must be separated.
     * So here we are remove changes made on the users table
     * @return void
     */
    public $table_name = 'users';
    public function up()
    {
        Schema::table($this->table_name, function (Blueprint $table) {
            if(!Schema::hasColumn($this->table_name, 'name')){
                $table->string('name')->default(null)->nullable(true);
            }

            if(Schema::hasColumn($this->table_name, 'first_name')){$table->dropColumn('first_name');}
            if(Schema::hasColumn($this->table_name, 'last_name')){$table->dropColumn('last_name');}
            if(Schema::hasColumn($this->table_name, 'address')){$table->dropColumn('address');}
            if(Schema::hasColumn($this->table_name, 'city')){$table->dropColumn('city');}
            if(Schema::hasColumn($this->table_name, 'country')){$table->dropColumn('country');}
            if(Schema::hasColumn($this->table_name, 'phone')){$table->dropColumn('phone');}
            if(Schema::hasColumn($this->table_name, 'fax')){$table->dropColumn('fax');}
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
        });
    }
}
