<?php
    class User
    {
        protected $username;
        protected $password;
        protected $emailll;
        protected $email;
        protected $id;
        protected $connected;

        public function __construct ($username, $password, $email)
        {
            $this -> username = $username;
            $this -> password = $password;
            $this -> email = $email;
            // $this -> id = $id;
            // $this -> connected = $connected;
        }

        public function validateUsername ()
        {
            if (!empty($this -> username)) {
                $regex_special_char = '/[#$%&*()+=\\[\];,.\/{}|":<>!?~\\\\]/';
                $nochar = ( preg_match($regex_special_char, $this -> username) ) ? false : true;
                if ( strlen($this -> username) <= 50 AND !(ctype_space($this -> username)) AND $nochar == true) {
                    return $this -> username;
                } else {
                    $_SESSION['error_username'] = 'Invalid username';
                    return $_SESSION['error_username'];
                }
            } else {
                $_SESSION['error_username'] = 'Empty username';
                return $_SESSION['error_username'];
            }
        }

        public function validatePassword ()
        {
            if (!empty($this -> password)) {
                if ( strlen($this -> password) <= 50 AND !(ctype_space($this -> password)) ) {
                    $pwd_hash = password_hash($this -> password, PASSWORD_DEFAULT);
                    return $pwd_hash;
                } else {
                    $_SESSION['error_password'] = 'Invalid password';
                    return $_SESSION['error_password'];
                }
            } else {
                $_SESSION['error_password'] = 'Empty password';
                return $_SESSION['error_password'];
            }
        }

        public function validateEmail ()
        {
            if (!empty($this -> email)) {
                $sanitized_email = filter_var($this -> email, FILTER_SANITIZE_EMAIL);
                if (filter_var($sanitized_email, FILTER_VALIDATE_EMAIL)) {
                    $verified_email = filter_var($sanitized_email, FILTER_VALIDATE_EMAIL);
                    return $verified_email;
                } else {
                    $_SESSION['error_email'] = 'Invalid email';
                    return $_SESSION['error_email'];
                }
            } else {
                $_SESSION['error_email'] = 'Empty email';
                return $_SESSION['error_email'];
            }
        }
    }
?>