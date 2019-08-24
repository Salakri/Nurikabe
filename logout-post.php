<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/13
 * Time: 18:25
 */

require '../lib/site.inc.php';

unset($_SESSION['user']);
$root = $site->getRoot();
header("location: " . "$root/");
