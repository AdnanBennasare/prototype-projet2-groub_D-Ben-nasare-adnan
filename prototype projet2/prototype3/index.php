<?php


include __DIR__ . '/managers/GestionVille.php';



    // Trouver tous les employés depuis la base de données 
    $gestionVille = new GestionVille();
    $villes = $gestionVille->RechercherTous();
    // print_r($projects);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./UI/Styles/style.css">
    <title>Gestion des villes</title>
</head>
<body>
    <div>
        <a href="UI/ajouterVille.php">Ajouter un villes</a>
        <table>
            <tr>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
            <?php
                    foreach($villes as $ville){
            ?>

            <tr>
                <td><?= $ville->getNom() ?></td>

                <td>
                    <a href="UI/editerville.php?id=<?php echo $ville->getId() ?>">Éditer</a>
                    <a href="UI/suprimerVille.php?id=<?php echo $ville->getId() ?>">Supprime</a>
                    <a href="UI/ajouterStagiaire.php?ville_id=<?php echo $ville->getId() ?>">ajouter Stagiaire</a>

                </td>
            </tr>
            <?php }?>
        </table>
        <a href="UI/lesStagiaire.php">les stagiaires </a>

    </div>
</body>
</html>