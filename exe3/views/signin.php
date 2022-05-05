<?php
    require_once './../controllers/Classes/FormUser.php';
    
    session_start();

    $form = new FormUser();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="create account">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create an account</title>
    </head>

    <body>
        <h1>Create an account</h1>

        <?= $error_existing_user = (!empty($_SESSION['user_already_exist'])) ? $_SESSION['user_already_exist'] : '' ; ?>
        
        <?php $form -> formStart('./../controllers/signin_controller.php', 'post'); ?>

        <?= $error_username = (!empty($_SESSION['error_username'])) ? $_SESSION['error_username'] : '' ; ?>
        <?php $form -> input('text', 'username', 'Username :'); ?>

        <?= $error_username = (!empty($_SESSION['error_email'])) ? $_SESSION['error_email'] : '' ; ?>
        <?php $form -> input('email', 'email', 'Email :'); ?>

        <?= $error_username = (!empty($_SESSION['error_password'])) ? $_SESSION['error_password'] : '' ; ?>
        <?php $form -> passwordInput('password', 'pwd', 'Password :'); ?>

        <?php $form -> submit('submit', 'signin', 'Sign in'); ?>
    </body>
</html>