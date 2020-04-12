<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id'     => '738279145240-55dee8la9l1q8skqh5b4eq68ook9tovt.apps.googleusercontent.com',
        'client_secret' => 'LXaiesDawv2OeXX_TMUGXVzV',
        'redirect'      => 'http://localhost:8000/auth/google/callback',
    ],

    'github' => [
        'client_id' => '5909f8cea1644c0dc8e9',
        'client_secret' => 'ca3f656843985b346c3472a711710c018d4574c9',
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],

];
