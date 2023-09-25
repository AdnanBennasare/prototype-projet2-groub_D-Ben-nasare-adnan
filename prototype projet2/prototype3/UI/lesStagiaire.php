<?php

include "../managers/GestionStagiaire.php";
include "../managers/GestionVille.php";


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
        <a href="../index.php">Ajouter un stagiaire</a>
        <table>
            <tr>
                <th>Nom</th>
                <th>Cne</th>
                <th>ville</th>
                <th>Actions</th>
            </tr>
            <?php
                    foreach($stagiaires as $stagiaire){
                   
                $gestionVille = new GestionVille();                  
                $ville_names = $gestionVille->RechercherParId($stagiaire->getVille_id());
            ?>

            <tr>
                <td><?= $stagiaire->getNom() ?></td>
                <td><?= $stagiaire->getCne() ?></td>
            

                <td><?= $ville_names->getNom() ?></td>

                <td>
                    <a href="editerStagiaire.php?id=<?php echo $stagiaire->getId() ?>">Éditer</a>
                    <a href="supprimerStagiaire.php?id=<?php echo $stagiaire->getId() ?>">Supprime</a>
                </td>
            </tr>
            <?php }?>
        </table>
        <a href="ajouterVille.php">Ajouter ville</a>
    </div>
</body>
</html>