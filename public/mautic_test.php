<?php

// Bootup the Composer autoloader

include '../vendor/autoload.php';

$settings = require __DIR__ . '/../app/settings.php';

use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;

session_start();

$settings = array(
    // Required
    'baseUrl' => $settings['settings']['mautic']['baseUrl'],
    'callback' => $settings['settings']['mautic']['callback'],
    'clientKey' => $settings['settings']['mautic']['clientKey'],
    'clientSecret' => $settings['settings']['mautic']['clientSecret'],
    // To be get
    'accessToken' => isset($_SESSION['accessToken']) ? $_SESSION['accessToken'] : $container['settings']['mautic']['accessToken'],
    'refreshToken' => isset($_SESSION['refreshToken']) ? $_SESSION['refreshToken'] : $container['settings']['mautic']['refreshToken'],
    'expires' => isset($_SESSION['expires']) ? $_SESSION['expires'] : $container['settings']['mautic']['expires'],
    'version' => 'OAuth2'
);

try {
// Initiate the auth object
    $initAuth = new ApiAuth();
    $auth = $initAuth->newAuth($settings);
    $api = new MauticApi();
    $contactApi = $api->newApi('contacts', $auth, $settings['baseUrl']);

    $response = $contactApi->getList();
    echo "<h2>Result</h2>";
    if (isset($response['total'])) {
        echo "MauticTest: Sucess accessing API";
    } else {
        echo "MauticTest: Failed to access API.";
        echo "<pre>";
        print_r($response);
    }

    echo "<h2>Settings</h2>";
    echo "<pre>";
    var_dump($settings);

} catch (Exception $e) {
    // Do Error handling
    var_dump($e);
}