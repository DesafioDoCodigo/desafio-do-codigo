<?php
/**
 * Created by PhpStorm.
 * User: tiagogouvea
 * Date: 25/03/18
 * Time: 08:00
 */

// Bootup the Composer autoloader
include './../vendor/autoload.php';

use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;

session_start();

// ApiAuth->newAuth() will accept an array of Auth settings
$settings = array(
    'baseUrl' => 'http://br410.teste.website/~desaf342/mautic/',
    'userName'   => 'api',             // Create a new user
    'password'   => 'J@3j43kjf010mxa'              // Make it a secure password
);

// Initiate the auth object specifying to use BasicAuth
$initAuth = new ApiAuth();
$auth = $initAuth->newAuth($settings, 'BasicAuth');

var_dump($auth);

$api = new MauticApi();
$contactApi = $api->newApi('contacts', $auth, $settings['baseUrl']);


$response = $contactApi->getList();
var_dump($response);
$totalContacts = $response['total'];
var_dump($totalContacts);


$response = $contactApi->get(1);
var_dump($response);


$contact = $response[$contactApi->itemName()];
var_dump($contact);