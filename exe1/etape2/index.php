<?php
    require 'HTML.php';

    $html = new HTML();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $html -> metaTag('generate html w/ php', 'Test class'); ?>
        <title>Php Class</title>
        <?php $html -> linkTag('./style.css'); ?>
    </head>

    <body>
        <h1></h1>
        
        <?php
            $html -> imgTag('./MYJU.png', 'image', 400, 'auto');
            $html -> aTag('./index.php');
            $html -> scriptTag('./main.js');
        ?>
    </body>
</html>