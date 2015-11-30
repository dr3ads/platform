<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFieldsTblAddFieldType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fields', function ($table){
            $table->dropColumn('type');

        });
        Schema::table('fields', function ($table){

            $table->enum('type',['text','textarea','select','check'])->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fields', function ($table){
            //$table->integer('type');
            //do nothing
        });

    }
}
