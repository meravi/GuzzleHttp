<?php

require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$client = new Client([
    'verify' => false, // Disable SSL verification for testing purposes
]);

try {
    $response = $client->post("https://vernooy.staging.easypartyonline.nl/api/v1/", [
        'headers' => [
            "Authorization" => "Bearer ",// Bearer password
            "Content-Type" => "application/json",
        ],
        'json' => [
            "email" => "", // email/username
            "password" => "", //password
        ],
    ]);

    $body = $response->getBody();
    print_r(json_decode((string) $body));
} catch (RequestException $e) {
    echo 'Request failed: ' . $e->getMessage() . "\n";
    if ($e->hasResponse()) {
        echo 'Response: ' . $e->getResponse()->getBody();
    }
} catch (Exception $e) {
    echo 'An unexpected error occurred: ' . $e->getMessage();
}
