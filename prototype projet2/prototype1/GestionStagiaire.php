<?php

// include "../Entities/Stagiaire.php";
include __DIR__ . '/Stagiaire.php';




 
class GestionStagiaire{

    private $Connection = Null;

    private function getConnection(){
        if(is_null($this->Connection)){
            $this->Connection = mysqli_connect('localhost', 'root', '', 'aze');
            // Vérifier l'ouverture de la connexion avec la base de données

            if(!$this->Connection){
                $message =  'Erreur de connexion: ' . mysqli_connect_error(); 
                throw new Exception($message); 
            }
        }
        
        return $this->Connection;
        
    }


    
    public function RechercherTous(){
        $sql = 'SELECT id, nom, cne FROM stagiaire';
        $query = mysqli_query($this->getConnection() ,$sql);
        $stagiaires_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $stagiaires = array();
        foreach ($stagiaires_data as $stagiaire_data) {
            $stagiaire = new Stagiaire();
            $stagiaire->setId($stagiaire_data['id']);
            $stagiaire->setNom($stagiaire_data['nom']);
            $stagiaire->setCne($stagiaire_data['cne']);
            array_push($stagiaires, $stagiaire);
        }
        return $stagiaires;
    }


    
}




?>