<?php

include "GestionStagiaire.php";

    // Trouver tous les employés depuis la base de données 
    $gestionStagiaire = new GestionStagiaire();
    $stagiaires = $gestionStagiaire->RechercherTous();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./UI/Styles/style.css">
    <title>Gestion des stagiaires</title>
</head>
<body>
    <div>
   
        <table>
            <tr>
                <th>Nom</th>
                <th>Cne</th>
            </tr>
            <?php
                    foreach($stagiaires as $stagiaire){
            ?>

            <tr>
                <td><?= $stagiaire->getNom() ?></td>
                <td><?= $stagiaire->getCne() ?></td>
            
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>