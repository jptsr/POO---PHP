<?php
    class Connexion 
    {
        public $db;

        public static function bdd () {
            try {
                return new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die ('Erreur : ' . $e -> getMessage());
            }
        }
    }

    class Post
    {
        public $db;
        public $id_post;
        public $post_title;
        public $content_post;

        public function __construct ($db)
        {
            $this -> db = $db;
        }

        public function addPost (int $id, string $title, string $content)
        {
            $stmt = $this -> db -> prepare("INSERT INTO posts VALUES ($id, '$title', '$content')");
            $stmt -> execute();
            $stmt -> closeCursor();
            echo 'post added';
        }

        public function removePost ($id)
        {
            $stmt = $this -> db -> prepare("DELETE FROM posts WHERE id = $id");
            $stmt -> bindParam("id", $id);
            $stmt -> execute();
            $stmt -> closeCursor();
            echo 'post removed';
        }

        public function findAllPost ()
        {
            $res = $this -> db -> query("SELECT * FROM posts");
            while ($data = $res -> fetch(PDO::FETCH_ASSOC)) {
                var_dump($data);
            }
        }
    }
?>