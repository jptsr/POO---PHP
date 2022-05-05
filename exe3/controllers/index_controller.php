<?php
    require './../models/DatabaseConnexion.php';
    require './../models/DatabaseInteraction.php';

    $third_co = DatabaseConnexion::bd();
    $third_query = new Query($third_co);

    if (isset($_POST['login'])) {
        session_start();
        session_unset();        

        $user_username = $_POST['username'];
        $user_pwd = $_POST['pwd'];

        if (empty($user_username) OR empty($user_pwd) ) {
            $_SESSION['empty_username'] = ( empty($user_username) ) ? 'Empty username' : '' ;
            $_SESSION['empty_pwd'] = ( empty($user_pwd) ) ? 'Empty pwd' : '' ;
            header('location: ../views/index.php');
        } else {
            $does_user_exist = $third_query -> getData("SELECT * FROM exe3_user WHERE username = '$user_username'");

            if ( empty($does_user_exist) ) {
                $_SESSION['user_not_found'] = 'You don\'t have an account, please signin';
                header('location: ../views/index.php');
            } else {
                foreach ($does_user_exist as $value) {
                    if ( $value['username'] == $user_username AND password_verify($user_pwd, $value['password']) ) {
                        session_unset();

                        $_SESSION['username'] = $user_username;
                        $_SESSION['pwd'] = $user_pwd;

                        $third_query -> insertModifyData("UPDATE exe3_user SET connected = 1 WHERE username = '$user_username'");

                        header('location: ../views/user.php');
                    } else {
                        echo 'wrong pwd or/and username';
                        $_SESSION['wrong_username'] = ( !($value['username'] == $user_username) ) ? 'The username is incorrect' : '' ;
                        $_SESSION['wrong_pwd'] = ( !(password_verify($user_pwd, $value['password'])) ) ? 'The password is incorrect' : '' ;
                        header('location: ../views/index.php');
                    }
                }
            }
        }
    }

    // signin btn
    if ( isset($_POST['create_account']) ) {
        header('location: ../views/signin.php');
    }
?>