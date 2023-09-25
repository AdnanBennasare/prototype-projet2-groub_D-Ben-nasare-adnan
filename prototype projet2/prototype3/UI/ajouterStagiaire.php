<?php

include "../managers/GestionStagiaire.php";
include "../managers/GestionVille.php";

// Trouver tous les employés depuis la base de données 
$gestionStagiaire = new GestionStagiaire();

if (!empty($_POST)) {
	$stagiaire = new Stagiaire();
	$stagiaire->setNom($_POST['nom']);
	$stagiaire->setCne($_POST['cne']);
	$stagiaire->setVille_id($_POST['ville']);

	$gestionStagiaire->Ajouter($stagiaire);

	// Redirection vers la page index.php
	header("Location: ../index.php");
}

$gestionVille = new GestionVille();
$ville_names = $gestionVille->RechercherTous();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Style/style.css">
	<title>Gestion des stagiaire</title>

</head>

<body>

	<h1>Ajouter un stagiaire</h1>

	<form method="post" action="">
		<div>
			<label for="nom">nom</label>
			<input type="text" required="required" id="nom" name="nom" placeholder="nom">
		</div>
		<div>
			<label for="cne">cne</label>
			<input type="text" required="required" id="cne" name="cne" placeholder="cne">
		</div>
		<div>
			<label for="cne">ville</label>
			<select name="ville" id="ville">
				<?php
				foreach ($ville_names as $ville) {
					?>
				  <option value="<?php echo $ville->getId() ?>"><?php echo $ville->getNom() ?></option>

				<?php
				}
				?>
			</select>
		</div>
		<div>
			<button type="submit">Ajouter</button>
			<a href="../index.php">Annuler</a>
		</div>
	</form>
</body>

</html>