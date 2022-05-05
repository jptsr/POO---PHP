<?php
    require 'pdo_connexion.php';

    $db = Connexion::bdd();

    $display = new Post($db);
    $display -> findAllPost();
    $display -> removePost(1);
    $display -> addPost(1, 'sk', 'jdcsnojc,dm');
?>