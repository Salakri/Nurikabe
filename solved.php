<?php
require __DIR__ . '/lib/gaming.inc.php';

$cell = new Gaming\Cell();
$view = new Gaming\SolvedView($gaming);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nifty Nurikabe</title>

    <link href="style.less" type="text/css" rel="stylesheet" />
</head>

<body>
<?php echo $view->presentsolved();

?>

</body>
</html>