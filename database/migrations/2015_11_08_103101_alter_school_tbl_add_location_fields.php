<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSchoolTblAddLocationFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function($table){
            $table->string('zipcode', 10)->after('payout');
            $table->float('lat',20,10)->after('zipcode');
            $table->float('lng',20,10)->after('lat');
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
        Schema::table('schools', function($table){
            $table->dropColumn('zipcode');
            $table->dropColumn('lat');
            $table->dropColumn('lng');
        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
