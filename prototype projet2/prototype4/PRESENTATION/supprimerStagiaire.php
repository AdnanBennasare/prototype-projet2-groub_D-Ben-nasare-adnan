<?php
include "../DB/GestionStagiaire.php";



    

if(isset($_GET['id'])){

    $gestionStagiaire = new GestionStagiaire();
    $id = $_GET['id'] ;
    $gestionStagiaire->Supprimer($id);
        
    header('Location: ../index.php');
}
?>