<?php 
session_start();
if(!isset($_SESSION['role'])){
  header('Location: ./index.php');
}
if(empty($_SESSION['role'])){
  header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      #animated-svg{
        width: 90%;
        height: 100%;
        margin-left: 1%;
      }
      
    </style>
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="./css/accueil.css">
    <?php include("./header.php"); ?>
    <section>
      <div class="back_image">
        <div class="mot_bienvenue">
          <h1>
          BIENVENUE SUR  VOTRE <br> 
          PLATEFORME DE <br>
          SUIVI DES COURS
          </h1>
        </div>
        <div class="button-container">
          <a href="./enregistrer_user.php" class="button button_ajouter">Ajouter un enseignant</a>
          <a href="./cahier_text.php" class="button button_cours">Voir les cours</a>
        </div>
      </div>
      <div class="illustration">
      <object type="image/svg+xml" data="./assets/teaching-animate(1).svg" id="animated-svg"></object>
      </div>
    </section>
    <!-- <div class="container">
      <h1 class="typing-effect"></h1>
      <div class="button-container">
        <a href="./enregistrer_user.php" class="button">Ajouter un enseignant</a>
        <a href="./cahier_text.php" class="button">Voir les cours</a>
      </div>
    </div> -->
  
    <script src="./js/cursor.js"></script>
    <?php include("./footer.php"); ?>
