<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'elastic_email' => [
        'key' => env('ELASTIC_KEY'),
        'account' => env('ELASTIC_ACCOUNT')
    ],

    'sendgrid' => [
        'api_key' => env('SENDGRID_API_KEY'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '884396211720256',
        'client_secret' => '1a8b5dd2e6c3d1e2cdb1ad638c6da658',
        'redirect' => 'http://localhost/tiktok-laravel/public/login/facebook',
    ],

    'linkedin' => [
        'client_id' => '81al1fmkqzce7c',
        'client_secret' => 'n8Kkon2nrx2d6UAk',
        'redirect' => 'http://localhost/tiktok-laravel/public/login/linkedin',
    ],

     'google' => [
        'client_id' => '3010431564-fqrmc40luu56eu8kkl1ui0th8pql33gr.apps.googleusercontent.com',
        'client_secret' => '87QHw70CmF_sUxopj1yQyZxj',
        'redirect' => 'http://localhost/tiktok-laravel/public/login/google',
    ],
];
