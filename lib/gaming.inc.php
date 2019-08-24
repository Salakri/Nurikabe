<?php

require __DIR__ . "/../vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/2
 * Time: 8:23
 */

//
// Session
//
session_start();

define("GAMING_SESSION", 'gaming');

if(!isset($_SESSION[GAMING_SESSION])) {
    $_SESSION[GAMING_SESSION] = new Gaming\Gaming();
}

$gaming = $_SESSION[GAMING_SESSION];
