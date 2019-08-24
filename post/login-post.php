<?php
$open = true;		// Can be accessed when not logged in
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/16
 * Time: 17:39
 */

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/

require '../lib/gaming.inc.php';
require '../lib/site.inc.php';

$controller = new Gaming\LoginController($site, $_SESSION, $_POST);
header("location: " . $controller->getRedirect());