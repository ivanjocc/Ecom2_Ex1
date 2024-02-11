<?php
require '../config/database.php';
require '../class/Livre.class.php';
require '../class/RequestSql.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
	$bookId = $_POST['id'];

	$requestSql = new RequestSql($conn);

	$livre = new Livre(null, null, null, $bookId);
	$requestSql->deleteBook($livre);

	header('Location: ../index.php');
	exit;
} else {
	header('Location: ../index.php');
	exit;
}
