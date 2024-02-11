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

        echo "Libro añadido con éxito.";
    } else {
        echo "Por favor, rellena todos los campos del formulario.";
    }
} else {
    header('Location: ajouter_livre.html');
}

?>
