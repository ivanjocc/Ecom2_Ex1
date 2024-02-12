<?php
require 'config/database.php';
require 'class/Livre.class.php';
require 'class/RequestSql.php';

$requestSql = new RequestSql($conn);

$books = $requestSql->getBooks();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Book List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <header>
        <nav>
            <ul>
                <li>
                    <a href="./forms/ajouter_livre.html">Add a book</a>
                </li>
            </ul>
        </nav>

    </header>

    <h1>Book List</h1>

    <div class="books">
        <?php foreach ($books as $book) : ?>
            <div class="book">
                <img src="img/gato.jpg" alt="Image par default" style="width:300px;height:200px;">
                <h2><?php echo htmlspecialchars($book->getTitre()); ?></h2>
                <p>Auteur: <?php echo htmlspecialchars($book->getAuteur()); ?></p>
                <p>Annee de publication: <?php echo htmlspecialchars($book->getAnnee()); ?></p>
                <a href="forms/edit_book.php?id=<?php echo $book->getId(); ?>">Edit</a>

                <form action="forms/supprimer_livre.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $book->getId(); ?>">
                    <button type="submit" onclick="return confirm('¿Are you sure?');">Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Search a book</h2>

    <form action="forms/search_books.php" method="get">
        <label for="searchYear">Select the year</label>
        <input type="number" id="searchYear" name="year" required>
        <button type="submit">Search</button>
    </form>


</body>

</html>