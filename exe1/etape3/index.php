<?php
    require 'Form.php';
    require 'Validator.php';

    $form = new FormHTML();
    $name = 'name';
    $age = 'age';
    $grade = 'grade';
    $dataForm = new Validator($_POST[$name], $_POST[$age], $_POST[$grade]);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="validate data">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h1>Form</h1>

        <?php 
            $form -> formTagOpen('index.php', 'post');
            $form -> nameInput($name, 'Enter your name :');
            $form -> ageInput($age, 'Enter your age :');
            $form -> gradeInput($grade, 0.1, 'Enter your grade', 20);
            $form -> submit('submit', 'Submit');
            $form -> formTagEnd();
        ?>

        <?php
            $answer = $dataForm -> dataValid();
            echo $data1 = $answer[0];
            echo $data2 = $answer[1];
            echo $data3 = $answer[2];
        ?>
    </body>
</html>