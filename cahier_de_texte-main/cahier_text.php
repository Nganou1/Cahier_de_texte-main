<?php 
require("./config/fonction.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['role'])){
  header('Location: ./index.php');
}
if(empty($_SESSION['role'])){
  header('Location: ./index.php');
}
$cours = afficher_cours();
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des cours</title>
    <link rel="stylesheet" type="text/css" href="./css/cahier_text.css">
    <?php include("./header.php"); ?>
    <div class="container">
      <h1>Liste des cours</h1>
      <table>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>UE</th>
            <th>Classe</th>
            <th>Date</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Volume horaire</th>
            <th>Contenu</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($cours as $cour ):?>
              <tr>
                <td> <?= $cour->NOM ?> </td>
                <td> <?= $cour->PRENOM ?> </td>
                <td> <?= $cour->LIB_UE ?> </td>
                <td><?= $cour->LIB_CLASSE ?></td>
                <td> <?= $cour->DATE_ENS ?> </td>
                <td> <?= $cour->DEBUT_ENS ?></td>
                <td> <?= $cour->FIN_ENS ?></td>
                <td> <?= $cour->VOL_ENS ?></td>
                <td> <?= $cour->CONTENU ?></td>
              </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- <?php
      // Heures de début et de fin
      $heureDebut = "07:30";
      $heureFin = "10:00";

      // Convertir les heures en objets DateTime
      $debut = DateTime::createFromFormat('H:i', $heureDebut);
      $fin = DateTime::createFromFormat('H:i', $heureFin);

      // Calculer la différence en heures
      $diff = $fin->diff($debut);
      $volumeHoraire = $diff->h + ($diff->i / 60);

      // Afficher le volume horaire
      echo "Volume horaire : " . $volumeHoraire . " heures";
?> -->
    
    <?php include("./footer.php"); ?>
