<?php

include "managers/GestionStagiaire.php";

    // Trouver tous les employés depuis la base de données 
    $gestionStagiaire = new GestionStagiaire();
    $stagiaires = $gestionStagiaire->RechercherTous();
    // print_r($projects);
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
        <a href="UI/ajouter.php">Ajouter un stagiaire</a>
        <table>
            <tr>
                <th>Nom</th>
                <th>Cne</th>
                <th>Actions</th>
            </tr>
            <?php
                    foreach($stagiaires as $stagiaire){
            ?>

            <tr>
                <td><?= $stagiaire->getNom() ?></td>
                <td><?= $stagiaire->getCne() ?></td>
                <td>
                    <a href="UI/editerStagiaire.php?id=<?php echo $stagiaire->getId() ?>">Éditer</a>
                    <a href="UI/supprimerStagiaire.php?id=<?php echo $stagiaire->getId() ?>">Supprime</a>
                </td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>