<?php

class RequestSql {
	private $conn;

	public function __construct($conn) {
		$this->conn = $conn;
	}

	public function addBook(Livre $livre) {
		$stmt = $this->conn->prepare('INSERT INTO livres (titre, auteur, annee) VALUES (?, ?, ?)');
		$titre = $livre->getTitre();
		$auteur = $livre->getAuteur();
		$annee = $livre->getAnnee();
		$stmt->bind_param('ssi', $titre, $auteur, $annee);
		$stmt->execute();
		$stmt->close();
	}
	

	public function getBooks() {
		$result = $this->conn->query('select * from livres');
		$books = [];
		while ($row = $result->fetch_assoc()) {
			$books[] = $row;
		}
		return $books;
	}

	public function getBookById($id){
		$stmt = $this->conn->prepare('select * from livres where id = ?');
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$book = $result->fetch_assoc();
		$stmt->close();
		return $book;
	}

	public function updateBook($id, $titre, $auteur, $annee) {
		$stmt = $this->conn->prepare('update livres set titre = ?, auteur = ?, annee = ? where id = ?');
		$stmt->bind_param('ssii', $titre, $auteur, $annee, $id);
		$stmt->execute();
		$stmt->close();
	}

	public function deleteBook($id) {
		$stmt = $this->conn->prepare('delete from livres where id = ?');
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$stmt->close();
	}
}

?>