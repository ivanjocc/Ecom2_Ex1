<?php

class Livre {
	private $id;
	private $titre;
	private $auteur;
	private $annee;

	public function __construct($titre, $auteur, $annee, $id = null) {
		$this->id = $id;
		$this->titre = $titre;
		$this->auteur = $auteur;
		$this->annee = $annee;
	}

	public function getId(){
		return $this->id;
	}

	public function getTitre(){
		return $this->titre;
	}

	public function getAuteur(){
		return $this->auteur;
	}

	public function getAnnee(){
		return $this->annee;
	}

	public function setTitre($titre){
		$this->titre = $titre;
	}

	public function setAuteur($auteur){
		$this->auteur = $auteur;
	}

	public function setAnnee($annee){
		$this->annee = $annee;
	}
}

?>