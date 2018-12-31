<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default DynamoDb Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the DynamoDb connections below you wish
    | to use as your default connection for all DynamoDb work.
    */

    'default' => env('DYNAMODB_CONNECTION', 'aws_iam_role'),

    /*
    |--------------------------------------------------------------------------
    | DynamoDb Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the DynamoDb connections setup for your application.
    |
    | Most of the connection's config will be fed directly to AwsClient
    | constructor http://docs.aws.amazon.com/aws-sdk-php/v3/api/class-Aws.AwsClient.html#___construct
    */

    'connections' => [
        'aws' => [
            'credentials' => [
                'key' => env('DYNAMODB_KEY'),
                'secret' => env('DYNAMODB_SECRET'),
                // If using as an assumed IAM role, you can also use the `token` parameter
                'token' => env('AWS_SESSION_TOKEN'),
            ],
            'region' => 'ap-northeast-1',
             // if true, it will use Laravel Log.
             // For advanced options, see http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/configuration.html
            'debug' => env('DYNAMODB_DEBUG', false),
        ],
        'aws_iam_role' => [
            'region' => 'ap-northeast-1',
            'debug' => env('DYNAMODB_DEBUG', true),
        ],
    ],
];
