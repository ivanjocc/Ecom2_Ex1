<?php
require '../config/database.php';
require '../class/Livre.class.php';
require '../class/RequestSql.php';

$bookId = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (!$bookId) {
    header('Location: ../index.php');
    exit;
}

$requestSql = new RequestSql($conn);
$book = $requestSql->getBookById($bookId);

if (!$book) {
    echo "Book not found";
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
</head>
<body>

<h1>Edit Book</h1>


<form action="../process/process_edit_book.php" method="post">
    <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
    <div>
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($book['titre']); ?>" required>
    </div>
    <div>
        <label for="auteur">Auteur:</label>
        <input type="text" id="auteur" name="auteur" value="<?php echo htmlspecialchars($book['auteur']); ?>" required>
    </div>
    <div>
        <label for="annee">Annee de publication:</label>
        <input type="number" id="annee" name="annee" value="<?php echo $book['annee']; ?>" required>
    </div>
    <button type="submit">Update Book</button>
</form>

</body>
</html>
