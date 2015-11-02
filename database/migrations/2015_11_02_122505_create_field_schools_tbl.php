<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldSchoolsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_school', function( $table ){
            $table->increments('id');
            $table->integer('field_id')->unsigned();
            $table->integer('school_id')->unsigned();
            $table->timestamps();

            $table->foreign('field_id')->references('id')->on('fields');
            $table->foreign('school_id')->references('id')->on('schools');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::drop('field_schools');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
