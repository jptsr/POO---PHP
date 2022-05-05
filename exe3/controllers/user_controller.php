<?php
    require './../models/DatabaseConnexion.php';
    require './../models/DatabaseInteraction.php';
    require './../controllers/Classes/User.php';
    require './../controllers/Classes/Display.php';

    session_start();
    $current_username = (!empty($_SESSION['username'])) ? $_SESSION['username'] : '' ;
    $current_email = (!empty($_SESSION['email'])) ? $_SESSION['email'] : '' ;
    $current_pwd = (!empty($_SESSION['pwd'])) ? $_SESSION['pwd'] : '' ;

    $second_co = DatabaseConnexion::bd();
    $second_query = new Query($second_co);

    // MAJ username
    if ( isset($_POST['btn_modify_username']) ) {
        // unset variable session
        unset($_SESSION['error_username']);
        unset($_SESSION['new_username_already_exist']);
        // validate username
        $modify_username_data = new User($_POST['modify_username'], '', '');
        $new_username = $modify_username_data -> validateUsername();
        if ( empty($_SESSION['error_username']) ) {
            // check if username already exist
            $get_username = $second_query -> getData("SELECT * FROM exe3_user WHERE username = '$new_username'");
            if ( empty($get_username) ) {
                $second_query -> insertModifyData("UPDATE exe3_user SET username = '$new_username' WHERE username = '$current_username'");
                $_SESSION['username'] = $new_username;
                header('location: ../views/user.php');
            } else {
                $_SESSION['new_username_already_exist'] = 'This username is already existing';
                header('location: ../views/user.php');
            }
        } else {
            header('location: ../views/user.php');
        }
    }

    // MAJ email
    if ( isset($_POST['btn_modify_email']) ) {
        // unset variable session
        unset($_SESSION['error_email']);
        unset($_SESSION['new_email_already_exist']);
        // validate email
        $modify_email_data = new User('', '', $_POST['modify_email']);
        $new_email = $modify_email_data -> validateEmail();
        if ( empty($_SESSION['error_email']) ) {
            $second_query -> insertModifyData("UPDATE exe3_user SET email = '$new_email' WHERE username = '$current_username'");
            $_SESSION['email'] = $new_email;
            header('location: ../views/user.php');
        } else {
            header('location: ../views/user.php');
        }
    }

    // delete user db
    if ( isset($_POST['delete_user']) ) {
        $second_query -> deleteData("DELETE FROM exe3_user WHERE username = '$current_username'", $current_username);
        header('location: logout_controller.php');
    }

    // display user informations (username - email - connected status)
    $username_infos = $second_query -> getData("SELECT * FROM exe3_user WHERE username = '$current_username'");
    foreach ($username_infos as $value) {
        $current_user = new DisplayUserInfos($current_username, $current_email, $value['connected']);
        $_SESSION['current_user'] = $current_user -> displayAll();
    }

    // logout protocol
    if (isset($_POST['logout'])) {
        $second_query -> insertModifyData("UPDATE exe3_user SET connected = 0 WHERE username = '$current_username'");
        header('location: logout_controller.php');
    }
?>