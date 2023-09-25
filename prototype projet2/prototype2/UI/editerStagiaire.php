<?php


// include "../managers/GestionProject.php";
include __DIR__ . '/../managers/GestionStagiaire.php';




$gestionStagiaire = new GestionStagiaire();


if(isset($_GET['id'])){
    $stagiaire = $gestionStagiaire->RechercherParId($_GET['id']);
}


if(isset($_POST['modifier'])){

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $cne = $_POST['cne'];
    $gestionStagiaire->Modifier($id,$nom,$cne);
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
        <label for="cne">Description</label>
        <input type="text" required="required" 
        id="cne" name="cne" placeholder="cne"
        value=<?php echo htmlspecialchars(nl2br($stagiaire->getCne()), ENT_QUOTES); ?>>
    </div>

    <div>
        <input name="modifier" type="submit" value="Modifier">
        <a href="../index.php">Annuler</a>
    </div>
</form>
</body>
</html>