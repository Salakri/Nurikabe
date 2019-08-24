<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/21
 * Time: 16:50
 */


require '../lib/gaming.inc.php';
require '../lib/site.inc.php';
$controller = new Gaming\PasswordValidateController($site, $_POST, $_GET, $_SESSION);
header("location: " . $controller->getRedirect());
