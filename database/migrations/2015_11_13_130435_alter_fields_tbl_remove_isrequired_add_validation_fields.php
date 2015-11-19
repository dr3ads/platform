<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFieldsTblRemoveIsrequiredAddValidationFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fields', function($table){
            $table->dropColumn('is_required');
            $table->string('validation')->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fields', function($table){
            $table->boolean('is_required');
            $table->dropColumn('validation');
        });
    }
}
