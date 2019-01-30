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
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'qq' => [
        'client_id'     => '101534719',
        'client_secret' => 'b72650f404d45845858c7e9ef41b0cbc',
        'redirect'      => 'http://www.laravel-tube.com/qq/callback',
    ],

    'github' => [
        'client_id'     => 'f95d808cef2ff94d4b2c',
        'client_secret' => '0ea9502b17fb2ac3f527adadfd5ce5467d83184d',
        'redirect'      => 'http://social.test/github/callback',
    ],

    'wechat' => [
        'client_id'     => env('WECHAT_OPEN_APPID'),
        'client_secret' => env('WECHAT_OPEN_SECRET'),
        'redirect'      => env('WECHAT_OPEN_REDIRECT'),
    ],

];