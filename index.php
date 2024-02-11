<?php
require 'config/database.php';
require 'class/Livre.class.php';
require 'class/RequestSql.php';

// Crear una instancia de RequestSql
$requestSql = new RequestSql($conn);

// Obtener todos los libros
$libros = $requestSql->getBooks();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Book List</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h1>Book List</h1>

<div class="books">
    <?php foreach ($libros as $libro): ?>
        <div class="book">
            <img src="img/gato.jpg" alt="Image par default" style="width:300px;height:200px;">
            <h2><?php echo htmlspecialchars($libro->getTitre(), ENT_QUOTES, 'UTF-8'); ?></h2>
            <p>Auteur: <?php echo htmlspecialchars($libro->getAuteur(), ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Annee de publication: <?php echo htmlspecialchars($libro->getAnnee(), ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
