<?php
require __DIR__ . '/lib/gaming.inc.php';
$controller = new Gaming\GamingController($gaming, $_POST);
if($controller->isReset()) {
    unset($_SESSION[GAMING_SESSION]);
}
header("location: " . $controller->getRedirect());

exit;