<?php 
    class Connexion 
    {
        public $db;

        public function __construct ($db)
        {
            $this -> db = $db;
        }

        public function countTable ()
        {
            $res = $this -> db -> query("SELECT * FROM intro_challenge");
            while ($data = $res -> fetch(PDO::FETCH_ASSOC)) {
                var_dump($data);
            }
        }
    }
?>