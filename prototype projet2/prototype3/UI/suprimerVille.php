<?php
include "../managers/GestionVille.php";



if(isset($_GET['id'])){

    // Trouver tous les employés depuis la base de données 
    $gestionVille = new GestionVille();
    $id = $_GET['id'] ;
    $gestionVille->Supprimer($id);
        
    header('Location: ../index.php');
}
?>