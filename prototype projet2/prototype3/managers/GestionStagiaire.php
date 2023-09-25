<?php

// include "../Entities/Stagiaire.php";
include __DIR__ . '/../Entities/Stagiaire.php';




 
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

    public function Ajouter($stagiaire){

        $nom = $stagiaire->getNom();
        $cne = $stagiaire->getCne();
        $ville_id = $stagiaire->getVille_id();

        // requête SQL
        $sql = "INSERT INTO stagiaire(nom, cne, ville_id)
                                VALUES('$nom', '$cne', '$ville_id')";
        mysqli_query($this->getConnection(), $sql);
        
    }

    public function Supprimer($id){
        $sql = "DELETE FROM stagiaire WHERE id= '$id'";
        mysqli_query($this->getConnection(), $sql);
    }


    public function Modifier($id,$nom,$cne,$ville_id)
    {
        // Requête SQL
        $sql = "UPDATE stagiaire SET 
        nom='$nom', cne='$cne', ville_id='$ville_id'
        WHERE id= $id";

        //  
        mysqli_query($this->getConnection(), $sql);

        //
        if(mysqli_error($this->getConnection())){
            $msg =  'Erreur' . mysqli_errno($this->getConnection());
            throw new Exception($msg); 
        } 
    }

    
    public function RechercherTous(){
        $sql = 'SELECT id, nom, cne, ville_id FROM stagiaire';
        $query = mysqli_query($this->getConnection() ,$sql);
        $stagiaires_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $stagiaires = array();
        foreach ($stagiaires_data as $stagiaire_data) {
            $stagiaire = new Stagiaire();
            $stagiaire->setId($stagiaire_data['id']);
            $stagiaire->setNom($stagiaire_data['nom']);
            $stagiaire->setCne($stagiaire_data['cne']);
            $stagiaire->setVille_id($stagiaire_data['ville_id']);

            array_push($stagiaires, $stagiaire);
        }
        return $stagiaires;
    }

    public function RechercherParId($id){
        $sql = "SELECT * FROM stagiaire WHERE id= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $stagiaire_data = mysqli_fetch_assoc($result);
        $stagiaire = new Stagiaire();
        $stagiaire->setId($stagiaire_data['id']);
        $stagiaire->setNom($stagiaire_data['nom']);
        $stagiaire->setCne($stagiaire_data['cne']);
        $stagiaire->setVille_id($stagiaire_data['ville_id']);
        
        return $stagiaire;
    }


    
}




?>