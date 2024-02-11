<?php

require '../config/database.php';
require '../class/Livre.class.php';
require '../class/RequestSql.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'] ?? null;
    $auteur = $_POST['auteur'] ?? null;
    $annee = $_POST['annee'] ?? null;


    if ($titre && $auteur && $annee) {

        $livre = new Livre($titre, $auteur, $annee);

        $requestSql = new RequestSql($conn);
        $requestSql->addBook($livre);

        // echo "Done";
        header('Location: ../index.php');
    } else {
        echo "Please fill all the fields in the form";
    }
} else {
    header('Location: ../forms/ajouter_livre.html');
}

?>
