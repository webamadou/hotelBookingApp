<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceTypePrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prices', function (Blueprint $table){
            $table->integer('price_type');
             $table->dateTime('price_range_start')->nullable(true)->default(null);
             $table->dateTime('price_range_end')->nullable(true)->default(null);

            $table->unsignedInteger('roomCapacity_id')->nullable(true)->change();
            $table->unsignedInteger('roomType_id')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prices', function(Blueprint $table){
            $table->dropColumn('price_type');
            $table->dropColumn('price_range_start');
            $table->dropColumn('price_range_end');
        });
    }
}
