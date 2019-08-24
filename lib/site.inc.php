<?php
/**
 * @file
 * A file loaded for all pages on the site.
 */
require __DIR__ . "/../vendor/autoload.php";



$site = new Gaming\Site();
$localize = require 'localize.inc.php';
if(is_callable($localize)) {
    $localize($site);
}

// Start the session system
//session_start();
$user = null;
if(isset($_SESSION[Gaming\User::SESSION_NAME])) {
    $user = $_SESSION[Gaming\User::SESSION_NAME];
}