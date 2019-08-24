<?php

/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
require '../lib/gaming.inc.php';
require '../lib/site.inc.php';
$controller = new Gaming\SaveandloadController($gaming, $site, $_SESSION, $_POST);
header("location: " . $controller->getRedirect());