<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('schools')->truncate();
        DB::table('field_school')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        /*188 Montague Street
Brooklyn, NY  11201*/

        $schools['allen_school_brooklyn']['details'] = array(
            'name' => 'Allen School - Brooklyn',
            'payout' => 22.50,
            'zipcode' => '11201',
            'lat' => '40.693863',
            'lng' => '-73.991175',
            'domain_id' => '',
            'location_id' => '39314',
            'affiliate_location_id' => '42580',
            'vendor_id' => '4524',
            'form_id' => '4537',
            'campaign_id' => '5445',
        );
        $schools['allen_school_brooklyn']['fields'] = array(1,2,16,17,7,3,5,6,8,9,18,19,11,12,13,14,15,20);

        $schools['allen_school_jamaica']['details'] = array(
            'name' => 'Allen School - Jamaica',
            'payout' => 22.50,
            'zipcode' => '11432',
            'lat' => '40.711779',
            'lng' => '-73.793842',
            'domain_id' => '',
            'location_id' => '39312',
            'affiliate_location_id' => '42580',
            'vendor_id' => '4524',
            'form_id' => '4537',
            'campaign_id' => '5445',
        );
        $schools['allen_school_jamaica']['fields'] = array(1,2,16,17,7,3,5,6,8,9,18,21,11,12,13,14,15,20);


        $schools['allen_school_phoenix']['details'] = array(
            'name' => 'Allen School - Phoenix',
            'payout' => 22.50,
            'zipcode' => '85053',
            'lat' => '33.629889',
            'lng' => '-112.130812',
            'domain_id' => '',
            'location_id' => '39313',
            'affiliate_location_id' => '42580',
            'vendor_id' => '4524',
            'form_id' => '4537',
            'campaign_id' => '5445',
        );
        $schools['allen_school_phoenix']['fields'] = array(1,2,16,17,7,3,5,6,8,9,18,22,11,12,13,14,15,20);


        foreach($schools as $key => $school){
            $school_id = DB::table('schools')->insertGetId($school['details']);
            foreach($school['fields'] as $field){
                DB::table('field_school')->insert(array('field_id' => $field, 'school_id' => $school_id));
            }
        }



    }
}
