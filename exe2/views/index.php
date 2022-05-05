<?php
    require './../controllers/Voiture.php';
    
    $v1 = new Voiture('BE-J5N-N2-L25', '25/05/2000', 5000, 'Volvo', 'rouge', 3.8);
    $v2 = new Voiture('FR-F2D-W1-D52', '02/12/1966', 120000, 'Citroen', 'verte', 7);
    $v3 = new Voiture('BE-E4D-5S-2W1', '30/08/2004', 400000, 'Toyta', 'mauve', 15);
    $v4 = new Voiture('BE-XC5-5R-S22', '15/11/2001', 25000, 'Volvo', 'noire', 2.8);
    $v5 = new Voiture('DE-S5Q-S1-S45', '12/09/2015', 177000, 'ALphaRomeo', 'orange', 4);
    $v6 = new Voiture('BE-X5Q-E5-C2Q', '09/07/1991', 125236, 'Renaud', 'blanche', 3.5);
    $v7 = new Voiture('FR-X45-5A-S14', '01/10/2008', 20562, 'Renaud', 'rouge', 4.5);
    $v8 = new Voiture('DE-X4Q-S2-Q34', '26/01/1999', 325120, 'Volvo', 'noire', 6);
    $v9 = new Voiture('BE-S8Q-A6-S2Q', '13/12/2021', 123654, 'Toyota', 'blanche', 20);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <table>
            <tr>
                <th>Brand</th>
                <th>Color</th>
                <th>Model</th>
                <th>Date of release (age)</th>
                <th>Usability</th>
                <th>Plate number</th>
                <th>Disponibility</th>
                <th>Img</th>
            </tr>

            <?= $v1 -> display('https://www.cars-data.com/webp/ferrari/ferrari-812-gts_4600_2.webp'); ?>
            <?= $v2 -> display('https://www.cars-data.com/webp/thumbs/350px/lamborghini/lamborghini-aventador_4228_1.webp'); ?>
            <?= $v3 -> display('https://www.cars-data.com/webp/thumbs/350px/lamborghini/lamborghini-aventador_4228_21.webp'); ?>
            <?php 
                $v4 -> differentMileage(321123);
                echo $v4 -> display('https://www.cars-data.com/webp/thumbs/350px/lamborghini/lamborghini-aventador_4228_20.webp');
            ?>
            <?= $v5 -> display('https://www.cars-data.com/webp/thumbs/350px/alfa-romeo/alfa-romeo-159-sportwagon_26_1.webp'); ?>
            <?= $v6 -> display('https://www.cars-data.com/webp/thumbs/350px/audi/audi-100-avant_81_2.webp'); ?>
            <?php 
                $v7 -> run();
                echo $v7 -> display('https://www.cars-data.com/webp/thumbs/350px/audi/audi-a4-avant_130_1.webp');
            ?>
            <?= $v8 -> display('https://www.cars-data.com/webp/thumbs/350px/audi/audi-s4-avant_136_1.webp'); ?>
            <?= $v9 -> display('https://www.cars-data.com/webp/thumbs/350px/audi/audi-a6-avant_178_1.webp'); ?>
        </table>
    </body>
</html>