<?php
    require './Classes/User.php';
    require './../models/DatabaseConnexion.php';
    require './../models/DatabaseInteraction.php';

    $first_co = DatabaseConnexion::bd();
    $first_query = new Query($first_co);

    if (isset($_POST['signin'])) {
        $user = new User($_POST['username'], $_POST['pwd'], $_POST['email']);

        session_start();
        session_unset();

        // verify data username
        $user_username = $user -> validateUsername();

        // verify data email
        $user_email = $user -> validateEmail();

        // verify data password
        $user_pwd = $user -> validatePassword();

        if ( (empty($_SESSION['error_username']) == false) OR (empty($_SESSION['error_email']) == false) OR (empty($_SESSION['error_password']) == false) ) {
            header('location: ../views/signin.php');
        } else {
            session_unset();

            $_SESSION['username'] = $user_username;
            $_SESSION['email'] = $user_email;
            $_SESSION['pwd'] = $user_pwd;

            $is_user_existing = $first_query -> getData("SELECT * FROM exe3_user WHERE username = '$user_username'");
            if ( empty($is_user_existing) ) {
                $first_query -> insertModifyData("INSERT INTO exe3_user VALUES (0, '$user_username', '$user_email', '$user_pwd', 1)");
                header('location: ../views/user.php');
            } else {
                foreach ($is_user_existing as $value) {
                    if ( !($value['username'] == $user_username) ) {
                        $first_query -> insertModifyData("INSERT INTO exe3_user VALUES (0, '$user_username', '$user_email', '$user_pwd', 1)");
                        header('location: ../views/user.php');
                    } else {
                        $_SESSION['user_already_exist'] = 'Username already existing';
                        header('location: ../views/signin.php');
                    }
                }
            }
        }
    }
?>