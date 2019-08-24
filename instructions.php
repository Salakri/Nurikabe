<?php
require __DIR__ . '/lib/gaming.inc.php';
$view = new Gaming\InstructionView($gaming);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nifty Nurikabe</title>

    <link href="style.less" type="text/css" rel="stylesheet" />
</head>
<?php echo $view->presentinstruc(); ?>
<body>



</body>
</html>