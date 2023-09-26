<?php

include "DB/GestionStagiaire.php";
include "DB/GestionVille.php";


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
 
    <title>Gestion des stagiaires</title>
</head>
<body>
    <div>
        <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
        <a class="btn btn-primary" style="width:200px;" href="PRESENTATION/ajouterStagiaire.php">Ajouter un stagiaire</a>
        </div>
       
        <div class="container">
        <table class="table mb-5">
            <tr>
                <th>Nom</th>
                <th>Cne</th>
                <th>ville</th>
                <th>type</th>

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
                <td><?= $stagiaire->getType() ?></td>
                <td><?= $ville_names->getNom() ?></td>

                <td>
                    <a class="btn btn-secondary" href="PRESENTATION/editerStagiaire.php?id=<?php echo $stagiaire->getId() ?>">Éditer</a>
                    <a class="btn btn-info" href="PRESENTATION/supprimerStagiaire.php?id=<?php echo $stagiaire->getId() ?>">Supprime</a>
                </td>
            </tr>
            <?php }?>
        </table>
        </div>
    
     
    </div>
    <div class="container">
        <canvas id="myChart"></canvas>
    </div>







    <?php
   $chartData = $gestionStagiaire->CountStagiaireByVille();
    ?>
<script>

function getRandomColor() {
    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);
    return `rgb(${r}, ${g}, ${b})`;
}

    var ctx = document.getElementById('myChart').getContext('2d');
var chartData = <?php echo json_encode($chartData); ?>;
var cityNames = chartData.map(item => item.city_name); // Array of city names
var counts = chartData.map(item => item.count_stagiaire);

var backgroundColors = [];

// Generate random colors for each city
for (var i = 0; i < cityNames.length; i++) {
    backgroundColors.push(getRandomColor());
}


var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: cityNames, // Use city names as labels
        datasets: [{
            data: counts,
            backgroundColor: backgroundColors,
        
        }]
    },
});


</script>










</body>
</html>