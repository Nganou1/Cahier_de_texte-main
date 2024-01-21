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
$ues = afficher_ue();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Saisie des cours</title>
    <link rel="stylesheet" type="text/css" href="./css/saisie_cours.css">
    <?php include("./header.php") ?>
    <div class="container">
      
      <form action="./cahier_text.php">
        <h1>Saisie des cours</h1>
        <div class="form-group">
          <label for="nom">Nom :</label>
          <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
          <label for="prenom">Prénom :</label>
          <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
        <label for="ue">UE:</label>
          <select class="role" id="ue" name="ue"  aria-label="Default select example">
            <option selected>UE</option>
            <?php 
              foreach($ues as $ue ):
            ?>
            <option value="<?= $ue->ID_UE?>"><?= $ue->LIB_UE?></option>
            <?php endforeach; ?>
          </select>
          <br>
        </div>
        <div class="form-group">
          <label for="heure-debut">Heure de début :</label>
          <input type="time" id="heure-debut" name="heure-debut" required>
        </div>
        <div class="form-group">
          <label for="heure-fin">Heure de fin :</label>
          <input type="time" id="heure-fin" name="heure-fin" required>
        </div>
        <div class="form-group">
          <label for="volume-horaire">Volume horaire :</label>
          <input type="number" id="volume-horaire" name="volume-horaire" required>
        </div>
        <div class="form-group">
          <label for="contenu">Contenu :</label>
          <textarea id="contenu" name="contenu" required></textarea>
        </div>
        <div class="button-container">
          <button type="submit" class="button">Enregistrer</button>
          <button type="reset" class="button">Annuler</button>
        </div>
      </form>
    </div>
    <?php include("./footer.php") ?>
