<?php

use Illuminate\Database\Seeder;
use Platform\Models\Field;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('fields')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $fields = [
            ['name' => 'First Name', 'slug' => 'firstname', 'type' => 'text', 'options' => '','validation' => 'required:true'],
            ['name' => 'Last Name','slug' => 'lastname', 'type' => 'text', 'options' => '','validation' => 'required:true'],
            ['name' => 'Street Address/PO Box:', 'slug' => 'address', 'type' => 'text', 'options' => '', 'validation' => ''],
            ['name' => 'Apt/Suite:', 'slug' => 'aptsuite', 'type' => 'text', 'options' => '', 'validation' => ''],
            ['name' => 'City', 'slug' => 'city', 'type' => 'text', 'options' => '','validation' => 'required:true'],
            ['name' => 'State', 'slug' => 'state', 'type' => 'select', 'options' => json_encode( $this->getStateList() ),'validation' => 'required:true'],
            ['name' => 'Email','slug' => 'email', 'type' => 'text', 'options' => '', 'validation' => 'required:true|email:true'],
            ['name' => 'ZipCode', 'slug' => 'zip', 'type' => 'text', 'options' => '', 'validation' => 'required|minLength:5|maxLength:6'],
            ['name' => 'Highschool Graduation Year','slug' => 'gradYear', 'type' => 'text', 'options' => '', 'validation' => 'required:true|number: true'],
            ['name' => 'Preferred Location',
                'slug' => 'locationID',
                'type' => 'select',
                'options' => json_encode(array(
                    'Allen School - Brooklyn' => '39314',
                    'Allen School - Jamaica' => '39312',
                    'Allen School - Phoenix' => '39313',
            )),'validation' => 'required:true'],
            ['name' => 'Best Time to Contact',
                'slug' => 'bttc',
                'type' => 'select',
                'options' => json_encode(array(
                    'Anytime' => 'Anytime',
                    'Morning' => 'Morning',
                    'Afternoon' => 'Afternoon',
                    'Everything' => 'Everything',
                )),'validation' => 'required:true'],
            ['name' => 'Highest Level of Education',
                'slug' => 'edulevel',
                'type' => 'select',
                'options' => json_encode(array(
                    'Anytime' => 'Anytime',
                    'Morning' => 'Morning',
                    'Afternoon' => 'Afternoon',
                    'Everything' => 'Everything',
                )),'validation' => 'required:true'],
/*            ['name' => 'Highest Level of Education',
                'slug' => 'edulevel',
                'type' => 'select',
                'options' => array(
                    "No HS Diploma/GED",
                    "HS Grad / GED",
                    "Associate's Degree",
                    "Bachelor's Degree",
                    "Master's Degree",
                    "Doctorate Degree",
                ),'validation' => 'required:true'],*/
            ['name' => 'When are you interested in beginning classes?',
                'slug' => 'class',
                'type' => 'select',
                'options' => json_encode(array(
                    '0_3_months' => '3 months or less',
                    '3 months or less' => '3-6 months',
                    '6_12_months' => '6-12 months',
                    '12_plus_months' => '12 or more months',
                )),'validation' => 'required:true'],
            ['name' => 'Are you a US citizen?',
                'slug' => 'citizen',
                'type' => 'select',
                'options' => json_encode(array(
                    'Yes' => 'Yes',
                    'No' => 'No'
                )),'validation' => 'required:true'],
            ['name' => 'Are you currently attending another college?',
                'slug' => 'anothercollege',
                'type' => 'select',
                'options' => json_encode(array(
                    'Yes' => 'Yes',
                    'No' => 'No'
                )),'validation' => 'required:true'],
            ['name' => 'Day Phone Number', 'type' => 'text', 'options' => '', 'validation' => 'required:true|number: true'],
            ['name' => 'Eve Phone Number', 'type' => 'text', 'options' => '', 'validation' => 'required:true|number: true'],
            ['name' => 'Night Phone Number', 'type' => 'text', 'options' => '', 'validation' => 'required:true|number: true'],

        ];
        foreach($fields as $field){
            Field::create($field);
        }

    }


    protected function getStateList(){
        return $states = array(
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachussettes',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming',
        );
    }
}
