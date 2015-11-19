<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSchoolTblAddFormValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function($table){
            $table->string('domain_id');
            $table->string('location_id');
            $table->string('affiliate_location_id');
            $table->string('vendor_id');
            $table->string('form_id');
            $table->string('campaign_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function($table){
            $table->dropColumn('domain_id');
            $table->dropColumn('location_id');
            $table->dropColumn('affiliate_location_id');
            $table->dropColumn('vendor_id');
            $table->dropColumn('form_id');
            $table->dropColumn('campaign_id');
        });
    }
}
