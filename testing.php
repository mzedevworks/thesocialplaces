<?php
require __DIR__.'/vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    'base_url' => 'http://192.168.56.32:8000',
    'defaults' => [
        'exceptions' => false
    ]
]);

$response = $client->post('/api/contact');

echo $response;
echo '\n\n';

