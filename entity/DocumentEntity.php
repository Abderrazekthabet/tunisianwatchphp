<?php

class DocumentEntity{
    private $id;
    private $nom;
    private $idreclamation;
    private $type;
    private $url;
            
    function __construct() {
        
    }
    
    
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getIdreclamation() {
        return $this->idreclamation;
    }

    public function getType() {
        return $this->type;
    }

    public function getUrl() {
        return $this->url;
    }

   

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setIdreclamation($idreclamation) {
        $this->idreclamation = $idreclamation;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

   
}
?>
