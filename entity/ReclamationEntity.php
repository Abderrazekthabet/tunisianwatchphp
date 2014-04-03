<?php

class ReclamationEntity {

    private $id;
    private $date;
    private $heure;
    private $description;
    private $titre;
    private $citoyen;
    private $iddomaine;
    private $etat;
    private $idgeolocalisation;
    private $idlieu;

    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getHeure() {
        return $this->heure;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getIdcitoyen() {
        return $this->citoyen;
    }

    public function getIddomaine() {
        return $this->iddomaine;
    }

    public function getEtat() {
        return $this->etat;
    }

    public function getIdgeolocalisation() {
        return $this->idgeolocalisation;
    }

    public function getIdlieu() {
        return $this->idlieu;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setHeure($heure) {
        $this->heure = $heure;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setIdcitoyen($citoyen) {
        $this->citoyen = $citoyen;
    }

    public function setIddomaine($iddomaine) {
        $this->iddomaine = $iddomaine;
    }

    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function setIdgeolocalisation($idgeolocalisation) {
        $this->idgeolocalisation = $idgeolocalisation;
    }

    public function setIdlieu($idlieu) {
        $this->idlieu = $idlieu;
    }

}

?>