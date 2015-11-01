<?php


/**
 * Schools model config
 */
return array(
    'title' => 'Fields',
    'single' => 'Field',
    'model' => 'Platform\Models\Field',
    /**
     * The display columns
     */
    'columns' => array(
       
        'name' => array(
            'title' => 'Name',
            'select' => "(:table).name",
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
        'status' => array(
            'type' => 'bool',
            'title' => 'Active?',
          
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