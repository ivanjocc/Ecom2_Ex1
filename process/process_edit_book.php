<?php

require '../config/database.php';
require '../class/Livre.class.php';
require '../class/RequestSql.php';

$id = $_POST['id'] ?? null;
$titre = $_POST['titre'] ?? '';
$auteur = $_POST['auteur'] ?? '';
$annee = $_POST['annee'] ?? '';

$requestSql = new RequestSql($conn);

$livre = new Livre($titre, $auteur, $annee, $id);

$requestSql->updateBook($livre);

header('Location: ../index.php');
exit;

?>
