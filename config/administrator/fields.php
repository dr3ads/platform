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

        'type' => array(
            'title' => 'Field Type',
            'select' => "(:table).type",
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
            'title' => 'Field Name',
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
        
        'type' => array(
            'type' => 'enum',
            'title' => 'Field Type',
            'options' => array(
                'text' => 'Text',
                'textarea' => 'Textarea',
                'select' => 'Select',
            ),
        ),
        'options' => array(
            'title' => 'Options',
            'description' => 'Select options in JSON format',
            'type' => 'textarea'
        ),
       
    ),
    'rules' => array(
       /* 'first_name' => 'required',*/
        /*'email' => 'required|email|unique:users',*/
        'name' => 'required',
        'type' => 'required'
        
    ),
    'form_width' => 500,
   
);