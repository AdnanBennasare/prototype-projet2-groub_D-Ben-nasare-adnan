<?php

include "../managers/GestionVille.php";

// Trouver tous les employés depuis la base de données 
$gestionVille = new GestionVille();


if(!empty($_POST)){
	$ville = new Ville();
	$ville->setNom($_POST['nom']);


	$gestionVille->Ajouter($ville);
	
	// Redirection vers la page index.php
	header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/style.css">
	<title>Gestion des ville</title>
	
</head>
<body>

<h1>Ajouter un ville</h1>

<form method="post" action="">
	<div>
		<label for="nom">nom</label>
		<input type="text" required="required" id="nom" name="nom" 
		placeholder="nom">
	</div>
	<div>
		<button type="submit">Ajouter</button>
		<a href="../index.php">Annuler</a>
	</div>
</form>
</body>
</html>