<?php

// Bootup the Composer autoloader
include '../vendor/autoload.php';

use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;

session_start();

$publicKey = '';
$secretKey = '';
$callback  = '';

$baseUrl = '';
$clientKey = '';
$clientSecret = '';

$accessToken = '';
$accessTokenSecret = '';

// If you already have the access token, et al, pass them in as well to prevent the need for reauthorization
//$settings['accessToken']        = $accessToken;
//$settings['accessTokenSecret']  = $accessTokenSecret; //for OAuth1.0a
//$settings['accessTokenExpires'] = $accessTokenExpires; //UNIX timestamp
//$settings['refreshToken']       =  $refreshToken;


// @todo check if the request is sent from user with admin rights
// @todo check if Base URL, Consumer/Client Key and Consumer/Client secret are not empty

// @todo load this array from database or config file
$accessTokenData = array(
    'accessToken' => $accessToken,
    'accessTokenSecret' => $accessTokenSecret,
    'accessTokenExpires' => ''
);


if (isset($_SESSION['accessToken'])) {
    $accessTokenData['accessToken'] = $_SESSION['accessToken'];
}
if (isset($_SESSION['accessTokenSecret'])) {
    $accessTokenData['accessTokenSecret'] = $_SESSION['accessTokenSecret'];
}

if (isset($_GET['access_token'])) {
    $accessTokenData['accessToken'] = $_GET['access_token'];
    $_SESSION['accessToken'] = $_GET['access_token'];
}
if (isset($_GET['access_token_secret'])) {
    $accessTokenData['accessTokenSecret'] = $_GET['access_token_secret'];
    $_SESSION['accessTokenSecret'] = $_GET['access_token_secret'];
}


// @todo Sanitize this URL. Make sure it starts with http/https and doesn't end with '/'
$settings = array(
    'baseUrl'           => $baseUrl,
    'clientKey'         => $clientKey,
    'clientSecret'      => $clientSecret,
    'callback'          => $callback,
    'version'           => 'OAuth1a'
);

if (!empty($accessTokenData['accessToken']) && !empty($accessTokenData['accessTokenSecret'])) {
    $settings['accessToken']        = $accessTokenData['accessToken'] ;
    $settings['accessTokenSecret']  = $accessTokenData['accessTokenSecret'];
    $settings['accessTokenExpires'] = $accessTokenData['accessTokenExpires'];
}

$auth = \Mautic\Auth\ApiAuth::initiate($settings);

if ($auth->validateAccessToken()) {
    var_dump("A");
    if ($auth->accessTokenUpdated()) {
        var_dump("b");
        $accessTokenData = $auth->getAccessTokenData();
        var_dump($accessTokenData);
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
    var_dump("D");
}