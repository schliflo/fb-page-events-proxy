<?php
return array(
    'api_base_url' => 'https://graph.facebook.com/v3.1/',
    'app_id' => '1234567890',
    'access_token' => 'abcdefgh1234567890', // use non-expiring token obtained like this: https://medium.com/@Jenananthan/how-to-create-non-expiry-facebook-page-token-6505c642d0b1
    'page_id' => 'your-page',
    'allowed_origins' => [
        'http://localhost',
        'http://your-domain.com',
        'https://your-domain.com',
    ],
);
