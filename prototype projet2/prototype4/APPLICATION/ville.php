<?php

class Ville {

    private $id;
    private $nom;
   
   
    public function getId() {
        return $this->id;
    }
    public function setId($ID) {
        $this->id = $ID;
    }

    public function getNom() {
        return $this->nom;
    }
    public function setNom($NOM) {
        $this->nom = $NOM;
    }

}
     
?>