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
$grades = afficher_grade();
$sexes = afficher_sexe();
$specialites = afficher_specialite();

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Page d'enregistrement</title>
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <style>
      body{
        background-image: url("./assets/back.jpg");
        background-size: cover;
      }
      .container{
        width: 40%;
      }
      .login{
        width: 100%;
      }
      .row{
        display: flex;
        justify-content: space-between;
      }
      .form-group{
        width: 40%;
      }
      .form-group input{
        width: 100%;
      }
      .form-group-select{
        width: 32%;
      }
      .form-group-select select{
        width: 100%;
      }
    </style>
  <?php include("./header.php") ?>
    <div class="container" style="margin-top: 3%;">
      <div class="login">
        <h1>Enregistrer les enseignants</h1>
        <form action="./controller/enregistrement.php" method="POST">
          <div class="row" >
            <div class="form-group">
              <label for="nom">Nom:</label>
              <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group" >
              <label for="prenom">Prenom:</label>
              <input type="text" id="prenom" name="prenom" required>
            </div>  
          </div>
          <label for="contact">Contact:</label>
          <input type="email" id="contact" name="contact" required>
            
          <label for="username">Nom d'utilisateur:</label>
          <input type="text" id="username" name="username" required>
            
          <div class="row">
            <div class="form-group-select">
              <label for="role">Role:</label>
              <select class="role" id="role" name="role"  aria-label="Default select example">
                <option selected>Role</option>
                <option value="Administrateur">Administrateur</option>
                <option value="enseignant">Enseignant</option>
              </select>
              <br>
            </div>
            <div class="form-group-select">
              <label for="grade">Grade:</label>
              <select class="role" id="grade" name="grade"  aria-label="Default select example">
                <option selected>Grade</option>
                <?php 
                    foreach($grades as $grade ):
                ?>
                <option value="<?= $grade->ID_GRADE?>"><?= $grade->LIB_GRADE?></option>
                <?php endforeach; ?>
              </select>
              <br>
            </div>
          </div>
          <div class="row">
            <div class="form-group-select">
              <label for="specialite">Specialité:</label>
              <select class="role" id="specialite" name="specialite"  aria-label="Default select example">
                <option selected>specialite</option>
                <?php 
                    foreach($specialites as $specialite ):
                ?>
                <option value="<?= $specialite->ID_SPECIALITE?>"><?= $specialite->LIB_SPECIALITE?></option>
                <?php endforeach; ?>
              </select>
              <br>
            </div>
            <div class="form-group-select">
              <label for="sexe">Sexe:</label>
              <select class="role" id="sexe" name="sexe"  aria-label="Default select example">
                <option selected>Sexe</option>
                <?php 
                    foreach($sexes as $sexe ):
                ?>
                <option value="<?= $sexe->ID_SEXE?>"><?= $sexe->LIB_SEXE?></option>
                <?php endforeach; ?>
              </select>
              <br>
            </div>
          </div>
          <label for="password">Mot de passe:</label>
          <input type="password" id="password" name="password" required>
          <br>
          <div class="button-container">
            <button type="submit" name="envoyer">Enregistrer</button>
            <button type="reset">Annuler</button>
          </div>
        </form>
        
      </div>
    </div>
    <!-- <script>
        let form = document.querySelector("form")
        form.addEventListener("submit",(e)=>{
            e.preventDefault()
        })
    </script> -->
   
    <?php include("./footer.php") ?>
