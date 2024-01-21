<?php 
require("../config/fonction.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "yeadd";
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $heure_debut = $_POST['heure-debut'];
    $heure_fin = $_POST['heure-fin'];
    $classe = $_POST['classe'];
    $ue = $_POST['ue'];
    $contenu = trim($_POST['contenu']);
    
  
    if (!empty($nom) && !empty($prenom) && !empty($heure_debut) && !empty($heure_fin)
        && !empty($contenu) && !empty($classe) && !empty($ue)) {
        echo "yo know";
        
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $heure_debut = htmlspecialchars($_POST['heure-debut']);
        $heure_fin = htmlspecialchars($_POST['heure-fin']);
        $classe = htmlspecialchars($_POST['classe']);
        $contenu = htmlspecialchars($_POST['contenu']);
        $ue = htmlspecialchars( $_POST['ue']);

        
        saisie_cours($nom,$prenom,$ue,$classe,$heure_debut,$heure_fin,$contenu);
    }
  }
?>