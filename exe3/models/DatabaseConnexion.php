<?php
    class DatabaseConnexion
    {
        public static function bd ()
        {
            try {
                return new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die('Erreur : ' . $e -> getMessage());
            }
        }
    }
?>