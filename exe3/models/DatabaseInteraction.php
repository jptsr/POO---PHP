<?php
    class Query
    {
        public $db_connection;

        public function __construct ($db_connection)
        {
            $this -> db_connection = $db_connection;            
        }

        public function getData ($query)
        {
            $stmt = $this -> db_connection -> prepare($query);
            $stmt -> execute();
            $stmt -> setFetchMode(PDO::FETCH_ASSOC);
            return $stmt -> fetchAll();
        }

        public function insertModifyData ($insert)
        {
            $stmt = $this -> db_connection -> prepare($insert);
            $stmt -> execute();
            $stmt -> closeCursor();
        }

        public function deleteData ($delete, $username)
        {
            $stmt = $this -> db_connection -> prepare($delete);
            $stmt -> bindParam("Delete", $username);
            $stmt -> execute();
            $stmt -> closeCursor();
        }
    }
?>