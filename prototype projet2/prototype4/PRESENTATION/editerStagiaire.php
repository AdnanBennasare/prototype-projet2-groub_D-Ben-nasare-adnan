<?php


include __DIR__ . '/../DB/GestionStagiaire.php';
include "../DB/GestionVille.php";




$gestionStagiaire = new GestionStagiaire();






if(isset($_GET['id'])){
    $stagiaire = $gestionStagiaire->RechercherParId($_GET['id']);
}


if(isset($_POST['modifier'])){

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $cne = $_POST['cne'];
    $type = $_POST['type'];
    $ville = $_POST['ville'];

    $gestionStagiaire->Modifier($id,$nom,$cne,$type,$ville);
    header('Location: ../index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Modifier Stagiaire </title>
</head>
<body>

<h1>Modification de Stagiaire : <?=$stagiaire->getNom() ?></h1>
<form method="post" action="">
    <input  type="hidden" required="required" 
        id="id" name="id"   
        value=<?php echo $stagiaire->getId()?> >

    <div>
        <label for="Nom">Nom</label>
        <input type="text" required="required" 
        id="nom" name="nom"  placeholder="nom" 
        value=<?php echo $stagiaire->getNom()?> >
    </div>
    <div>
        <label for="cne">Cne</label>
        <input type="text" required="required" 
        id="cne" name="cne" placeholder="cne"
        value=<?php echo htmlspecialchars(nl2br($stagiaire->getCne()), ENT_QUOTES); ?>>
    </div>


    <div>
			<label for="type">type</label>
            <select name="type" id="type">
            <option selected value="<?php echo $stagiaire->getType() ?>"><?php echo $stagiaire->getType() ?></option>
            <?php if ($stagiaire->getType() !== "stagiaire"): ?>
                <option value="stagiaire">stagiaire</option>
            <?php endif; ?>
            <?php if ($stagiaire->getType() !== "Person"): ?>
                <option value="Person">person</option>
            <?php endif; ?>
            </select>
	
	</div>



    <div>
    <label for="cne">ville</label>
    <select name="ville" id="ville">
        <?php

        $gestionVille = new GestionVille();   
        //-- BRING ALL CITIES --
        $ville_names = $gestionVille->RechercherTous();   

        // GET THE CITIE OF THE STAGIAIRE BY VILLE_ID
        $Selected_ville = $gestionVille->RechercherParId($stagiaire->getVille_id());
        ?>
        <option selected value="<?php echo $Selected_ville->getId() ?>"><?php echo $Selected_ville->getNom() ?></option>

        <?php
        //-- DO A FOR LOOP ON ALL CITIES AND DISPLAYING THEM --
        foreach ($ville_names as $ville) {
            // check if ville names !== the selected ville sow them
            if ($ville->getId() !== $Selected_ville->getId()) {
                // Exclude the selected value from the loop
                ?>
                <option value="<?php echo $ville->getId() ?>"><?php echo $ville->getNom() ?></option>
                <?php
            }
        }
        ?>
    </select>
</div>






    <div>
        <input name="modifier" type="submit" value="Modifier">
        <a href="../index.php">Annuler</a>
    </div>
</form>
</body>
</html>