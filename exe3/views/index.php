<?php
    require './../controllers/Classes/FormUser.php';

    session_start();

    $form = new FormUser();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="User form">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Form</title>
    </head>

    <body>
        <h1>Login</h1>

        <?= $error_user = (!empty($_SESSION['user_not_found'])) ? $_SESSION['user_not_found'] : '' ; ?>
        
        <p><?= $wrong_username = (!empty($_SESSION['wrong_username'])) ? $_SESSION['wrong_username'] : '' ; ?></p>
        <p><?= $wrong_pwd = (!empty($_SESSION['wrong_pwd'])) ? $_SESSION['wrong_pwd'] : '' ; ?></p>

        <?php $form -> formStart('./../controllers/index_controller.php', 'post'); ?>

        <?= $empty_username = (!empty($_SESSION['empty_username'])) ? $_SESSION['empty_username'] : '' ; ?>
        <?php $form -> input('text', 'username', 'Username :'); ?>

        <?= $empty_password = (!empty($_SESSION['empty_pwd'])) ? $_SESSION['empty_pwd'] : '' ; ?>
        <?php $form -> passwordInput('password', 'pwd', 'Password :'); ?>

        <?php $form -> submit('submit', 'login', 'Login'); ?>

        <?php $form -> btn('submit', 'create_account', 'Create account', 'If you dont\' have an account'); ?>    
    </body>
</html>