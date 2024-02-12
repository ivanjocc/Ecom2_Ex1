<?php
require '../config/database.php';
require '../class/Livre.class.php';
require '../class/RequestSql.php';

$year = $_GET['year'] ?? null;

$requestSql = new RequestSql($conn);
$books = $requestSql->searchBooksByYear($year);

echo "<a href='../index.php'>Go to Index</a>";

foreach ($books as $book) {
    echo "<div>";
    echo "<h2>" . htmlspecialchars($book->getTitre()) . "</h2>";
    echo "<p>Auteur: " . htmlspecialchars($book->getAuteur()) . "</p>";
    echo "<p>Annee: " . htmlspecialchars($book->getAnnee()) . "</p>";
    echo "</div>";
}
?>
