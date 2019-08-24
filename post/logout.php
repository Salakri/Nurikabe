<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/13
 * Time: 18:25
 */

require '../lib/site.inc.php';
require '../lib/gaming.inc.php';


/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
session_start();
session_unset();
session_destroy();

$root = $site->getRoot();
header("location: " . "$root/");
