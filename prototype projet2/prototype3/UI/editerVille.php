<?php


// include "../managers/GestionProject.php";
include __DIR__ . '/../managers/GestionVille.php';


// Trouver tous les employés depuis la base de données 
$gestionVille = new GestionVille();





if(isset($_GET['id'])){
    $ville = $gestionVille->RechercherParId($_GET['id']);
}


if(isset($_POST['modifier'])){

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $gestionVille->Modifier($id,$nom);
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
    <title>Modifier Villes </title>
</head>
<body>

<h1>Modification de villes : <?=$ville->getNom() ?></h1>
<form method="post" action="">
    <input  type="hidden" required="required" 
        id="id" name="id"   
        value=<?php echo $ville->getId()?> >

    <div>
        <label for="Nom">Nom</label>
        <input type="text" required="required" 
        id="nom" name="nom"  placeholder="nom" 
        value=<?php echo $ville->getNom()?> >
    </div>
   

    <div>
        <input name="modifier" type="submit" value="Modifier">
        <a href="../index.php">Annuler</a>
    </div>
</form>
</body>
</html>