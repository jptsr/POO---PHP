<?php
    require './../controllers/Classes/FormUser.php';
    require './../controllers/user_controller.php';
    $form = new FormUser();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="actual user page">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <div>
            <p><?= $error_username = (!empty($_SESSION['error_username'])) ? $_SESSION['error_username'] : '' ; ?></p>
            <p><?= $error_username = (!empty($_SESSION['new_username_already_exist'])) ? $_SESSION['new_username_already_exist'] : '' ; ?></p>
            <?php $form -> formStart('../controllers/user_controller.php', 'post'); ?>
            <?php $form -> input('text', 'modify_username', 'Modify username'); ?>
            <?php $form -> btn('submit', 'btn_modify_username', 'Modify', ''); ?>
        </div>

        <div>
            <p><?= $error_email = (!empty($_SESSION['error_email'])) ? $_SESSION['error_email'] : '' ; ?></p>
            <?php $form -> formStart('../controllers/user_controller.php', 'post'); ?>
            <?php $form -> input('email', 'modify_email', 'Modify email'); ?>
            <?php $form -> btn('submit', 'btn_modify_email', 'Modify', ''); ?>
        </div>

        <div>
            <?php $form -> formStart('../controllers/user_controller.php', 'post'); ?>
            <?php $form -> btn('submit', 'delete_user', 'Delete', 'Delete your account'); ?>
            <h6>(!Warning!) If you delete your account you'll get disconnected (you'll have to create a new account)</h6>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?= $display_user_infos = (!empty($_SESSION['current_user'])) ? $_SESSION['current_user'] : '' ; ?>
                </tbody>
            </table>
        </div>

        <div>
            <?php $form -> formStart('../controllers/user_controller.php', 'post'); ?>
            <?php $form -> btn('submit', 'logout', 'Logout', 'Logout : '); ?>
        </div>
    </body>
</html>