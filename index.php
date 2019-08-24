<?php
$open = true;
require 'lib/site.inc.php';

require __DIR__ . '/lib/gaming.inc.php';
$view = new Gaming\IndexView($gaming);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nifty Nurikabe</title>

    <link href="style.less" type="text/css" rel="stylesheet" />
</head>

<body>

<?php echo $view->present(); ?>

</body>
</html>