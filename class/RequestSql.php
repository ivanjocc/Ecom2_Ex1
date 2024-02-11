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
		$result = $this->conn->query('SELECT * FROM livres');
		$books = [];
		while ($row = $result->fetch_assoc()) {
			$books[] = new Livre($row['titre'], $row['auteur'], $row['annee'], $row['id']);
		}
		return $books;
	}	

	public function getBookById($id){
		$stmt = $this->conn->prepare('SELECT * FROM livres WHERE id = ?');
		$stmt->bind_param('i', $id);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($book = $result->fetch_assoc()) {
			$stmt->close();
			return new Livre($book['titre'], $book['auteur'], $book['annee'], $book['id']);
		}
		$stmt->close();
		return null;
	}	

	public function updateBook(Livre $livre) {
		$stmt = $this->conn->prepare('UPDATE livres SET titre = ?, auteur = ?, annee = ? WHERE id = ?');
		$stmt->bind_param('ssii', $livre->getTitre(), $livre->getAuteur(), $livre->getAnnee(), $livre->getId());
		$stmt->execute();
		$stmt->close();
	}

	public function deleteBook(Livre $livre) {
		$stmt = $this->conn->prepare('DELETE FROM livres WHERE id = ?');
		$stmt->bind_param('i', $livre->getId());
		$stmt->execute();
		$stmt->close();
	}
	
}

?>