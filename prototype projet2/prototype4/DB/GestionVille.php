<?php


include __DIR__ . '/../APPLICATION/ville.php';




 
class GestionVille {

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
        $sql = 'SELECT id, nom FROM ville';
        $query = mysqli_query($this->getConnection() ,$sql);
        $villes_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $villes = array();
        foreach ($villes_data as $ville_data) {
            $ville = new ville();
            $ville->setId($ville_data['id']);
            $ville->setNom($ville_data['nom']);
            array_push($villes, $ville);
        }
        return $villes;
    }

    public function RechercherParId($id){
        $sql = "SELECT * FROM ville WHERE id= $id";
        $result = mysqli_query($this->getConnection(), $sql);
        // Récupère une ligne de résultat sous forme de tableau associatif
        $ville_data = mysqli_fetch_assoc($result);
        $ville = new ville();
        $ville->setId($ville_data['id']);
        $ville->setNom($ville_data['nom']);
      
        
        return $ville;
    }
   
    
    
    
}




?>