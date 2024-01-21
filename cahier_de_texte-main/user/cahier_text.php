<?php 
require("../config/fonction.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['role'])){
  header('Location: ../index.php');
}
if(empty($_SESSION['role'])){
  header('Location: ../index.php');
}
$cours = afficher_cours();
$classes = afficher_classe();
?>


<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des cours</title>
    <link rel="stylesheet" type="text/css" href="../css/cahier_text.css">
    <?php include("./header.php"); ?>
    <div class="container">
      <h1>Liste des cours</h1>
      <label for="selectClasse">Sélectionner une classe :</label>
        <select id="selectClasse">
            <option value="0">Toutes les classes</option>
            <?php foreach ($classes as $classe): ?>
                <option value="<?= $classe->ID_CLASSE ?>"><?= $classe->LIB_CLASSE ?></option>
            <?php endforeach; ?>
        </select>

      <table id="coursTable">
        <thead>
          <tr>
            <th>UE</th>
            <th>Classe</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Date</th>
            <th>Volume horaire</th>
            <th>Contenu</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($cours as $cour ):?>
              <tr>
                <td> <?= $cour->LIB_UE ?> </td>
                <td><?= $cour->LIB_CLASSE ?></td>
                <td> <?= $cour->DEBUT_ENS ?></td>
                <td> <?= $cour->FIN_ENS ?></td>
                <td><?=$cour->DATE_ENS ?></td>
                <td> <?= $cour->VOL_ENS ?></td>
                <td> <?= $cour->CONTENU ?></td>
              </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
    </div>
    <script src="../js/burger.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Lorsqu'un changement se produit dans le select
            $('#selectClasse').change(function() {
                var classeId = $(this).val(); // Récupérer la valeur sélectionnée

                // Envoyer une requête AJAX pour récupérer les cours correspondants
                $.ajax({
                    url: '../controller/affiche_by_class_id.php', // URL du script PHP pour récupérer les cours
                    method: 'POST',
                    data: {
                        classeId: classeId
                    },
                    success: function(response) {
                        // Mettre à jour le tableau des cours
                        $('#coursTable tbody').html(response);
                    }
                });
            });
        });
    </script>
    <?php include("../footer.php"); ?>
