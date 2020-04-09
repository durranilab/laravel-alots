<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Custom config
    |--------------------------------------------------------------------------
    |
    | This option allows for the extension of the credentials config, also manage the SMS schedular model
    |
    */

    'username' => env('ALOTS_USERNAME'),

    'api_key' => env('ALOTS_API_KEY'),

    'sender_id' => env('ALOTS_SENDER_ID'),

    'format' => env('ALOTS_FORMAT', 'JSON'),

    'route' => env('ALOTS_ROUTE', 'TSTSMS'),

    'table_names' => [
        'messages'    => 'alots_messages',
    ],
    
];