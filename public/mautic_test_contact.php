<?php
/**
 * User: tiagogouvea
 * Date: 25/03/18
 * Time: 08:00
 */

// Bootup the Composer autoloader
include './../vendor/autoload.php';

use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;

session_start();

$settings = array(
    'baseUrl' => '',
    'userName'   => '',
    'password'   => ''
);

// Initiate the auth object specifying to use BasicAuth
$initAuth = new ApiAuth();
$auth = $initAuth->newAuth($settings, 'OAuth');

echo "<h1>Auth</h1>";
vd($auth);

$api = new MauticApi();
$contactApi = $api->newApi('contacts', $auth, $settings['baseUrl']);

$response = $contactApi->getList(null,1000,1);
echo "<h1>contactApi response</h1>";
vd($response);
$totalContacts = $response['total'];
echo "<h1>totalContacts</h1>";
vd($totalContacts);

echo "<h1>contactApi response</h1>";
$response = $contactApi->get(1);
vd($response);

echo "<h1>contact</h1>";
$contact = $response[$contactApi->itemName()];
vd($contact);

function vd($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}