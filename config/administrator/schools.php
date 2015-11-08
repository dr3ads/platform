<?php


/**
 * Schools model config
 */
return array(
    'title' => 'Schools',
    'single' => 'School',
    'model' => 'Platform\Models\School',
    /**
     * The display columns
     */
    'columns' => array(
       
        'name' => array(
            'title' => 'Name',
            'select' => "(:table).name",
        ),
        'formatted_payout' => array(
            'title' => 'Payout',
            'select' => "(:table).payout",
        ),
        'status' => array(
            'title' => 'Status',
            'select' => "IF((:table).status, '<span style=\"color: green\">Active</span>', '<span style=\"color:red\">Inactive</span>')",
        ), 

 
    ),
    /**
     * The filter set
     */
    'filters' => array(
        /*
        'first_name' => array(
            'title' => 'Name',
            'type' => 'relationship',
            ''
        ),
        */
        'title' => array(
            'title' => 'Title',
            'name_field' => 'title',
        ),
       
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name' => array(
            'title' => 'Title',
            'type' => 'text',
           
        ),
        'payout' => array(
            'type' => 'number',
            'title' => 'Payout',
            'symbol' => '$', //optional, defaults to ''
            'decimals' => 2, //optional, defaults to 0
            'thousands_separator' => ',', //optional, defaults to ','
            'decimal_separator' => '.', //optional, defaults to '.'
        ),
        'zipcode' => array(
            'type' => 'text',
            'title' => 'Zip Code',
            'description' => 'School Location'
        ),
        'status' => array(
            'type' => 'bool',
            'title' => 'Active?',
        ),
        'fields' => array(
            'type'=> 'relationship',
            'title' => 'Form Fields',
            'name_field' => 'name',
            'options_sort_field' => 'name',
        ),
       
    ),
    'rules' => array(
       /* 'first_name' => 'required',*/
        /*'email' => 'required|email|unique:users',*/
        'name' => 'required',
        'payout' => 'required',
        'status' => 'required'
        
    ),
    
   
);