<?php

// When opened, this file will redirect you to mautic auth, and then back to your
// $callback URL with state and code values.
// Copy params on URL and post on that .php file again to see the access_token
// and other things

// Must be set
$settings = require __DIR__.'/../app/settings.php';

$callback = $settings['settings']['mautic']['callback'];
$baseUrl = $settings['settings']['mautic']['baseUrl'];
$clientKey = $settings['settings']['mautic']['clientKey'];
$clientSecret = $settings['settings']['mautic']['clientSecret'];

// Bootup the Composer autoloader
include '../vendor/autoload.php';
use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;
use Rollbar\Rollbar;

session_start();
// session_destroy();
// session_start();

// Will be received
$accessToken = '';
$accessTokenSecret = '';
$accessTokenExpires = null;
$refreshToken = '';

// @todo check if the request is sent from user with admin rights
// @todo check if Base URL, Consumer/Client Key and Consumer/Client secret are not empty

// @todo load this array from database or config file
$accessTokenData = array(
    'accessToken' => $accessToken,
    'accessTokenExpires' => $accessTokenExpires
);


if (isset($_SESSION['accessToken'])) {
    $accessTokenData['accessToken'] = $_SESSION['accessToken'];
}
if (isset($_GET['access_token'])) {
    $accessTokenData['accessToken'] = $_GET['access_token'];
    $_SESSION['accessToken'] = $_GET['access_token'];
}

if (isset($_SESSION['accessToken'])) {
    $accessTokenData['accessToken'] = $_SESSION['accessToken'];
}
if (isset($_GET['refresh_token'])) {
    $accessTokenData['refreshToken'] = $_GET['refresh_token'];
    $_SESSION['refreshToken'] = $_GET['refresh_token'];
}

// @todo Sanitize this URL. Make sure it starts with http/https and doesn't end with '/'
$settings = array(
    'baseUrl' => $baseUrl,
    'clientKey' => $clientKey,
    'clientSecret' => $clientSecret,
    'callback' => $callback,
    'version' => 'OAuth2'
);

if (!empty($accessTokenData['accessToken']) && !empty($accessTokenData['accessTokenSecret'])) {
    $settings['accessToken'] = $accessTokenData['accessToken'];
    $settings['accessTokenExpires'] = $accessTokenData['accessTokenExpires'];
    $settings['refreshToken'] = $accessTokenData['refreshToken'];
}

// echo "<pre>";
// var_dump($_SESSION['oauth']);
// var_dump($_GET);
// die();

$initAuth = new ApiAuth();

/* @var $auth Mautic\Auth\OAuth */
$auth = $initAuth->newAuth($settings);
$auth->enableDebugMode();
try {
    if ($auth->validateAccessToken()) {
        // var_dump("A");
        if ($auth->accessTokenUpdated()) {
            // var_dump("b");
            $accessTokenData = $auth->getAccessTokenData();
            echo "<h3>accessTokenData</h3>";
            echo "<pre>";
            var_dump($accessTokenData);
            $_SESSION['accessToken'] = $accessTokenData['access_token'];
            $_SESSION['refreshToken'] = $accessTokenData['refresh_token'];
            $_SESSION['expires'] = $accessTokenData['expires'];
            var_dump("session updated");
            echo "Check it now on <a href='mautic_test.php'>mautic_test</a>";
            // @todo Save $accessTokenData
            // @todo Display success authorization message
        } else {
            var_dump("already authorized");
            // @todo Display info message that this app is already authorized.

            $api = new MauticApi();
            var_dump($settings['baseUrl']);
            $contactApi = $api->newApi('contacts', $auth, $settings['baseUrl']);
            $response = $contactApi->getList();
            var_dump($response);
            $totalContacts = $response['total'];
            var_dump($totalContacts);
        }
    } else {
        // @todo Display info message that the token is not valid.
        var_dump("Token is not valid?");
    }
} catch (Exception $exception) {
    echo "<h2>Exception</h2>";
    echo "<pre>";
    var_dump($exception);
}

echo "<pre>";
// var_dump($_SESSION['oauth']);