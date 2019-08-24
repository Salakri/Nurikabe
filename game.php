<?php
require __DIR__ . '/lib/gaming.inc.php';
if (!isset($_SESSION['name']) || isset($_SESSION['name']) == "") {
    header('Location: index.php');
    exit();
}
$cell = new Gaming\Cell();
$view = new Gaming\GamingView($gaming);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nifty Nurikabe</title>

    <link href="style.less" type="text/css" rel="stylesheet" />
</head>

<body>

<?php echo $view->presentgame();

?>

</body>
</html>