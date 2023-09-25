<?php
// include('../UI/GestionProject.php');
include "../managers/GestionStagiaire.php";



    

if(isset($_GET['id'])){

    // Trouver tous les employés depuis la base de données 
    $gestionStagiaire = new GestionStagiaire();
    $id = $_GET['id'] ;
    $gestionStagiaire->Supprimer($id);
        
    header('Location: lesStagiaire.php');
}
?>