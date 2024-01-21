<?php 
require("../config/fonction.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "yeadd";
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $username = trim($_POST['username']);
    $contact = trim($_POST['contact']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];
    $specialite = $_POST['specialite'];
    $sexe = $_POST['sexe'];
    $grade = $_POST['grade'];
  
    if (!empty($nom) && !empty($prenom) && !empty($username) && !empty($contact)
        && !empty($password) && !empty($role) && !empty($specialite)
        && !empty($sexe) && !empty($grade)) {
        echo "yo know";
        
        $nom = htmlspecialchars($nom);
        $prenom = htmlspecialchars($prenom);
        $username = htmlspecialchars($username);
        $contact = htmlspecialchars($contact);
        $password = htmlspecialchars($password);
        $role = htmlspecialchars($role);
        $specialite = htmlspecialchars($specialite);
        $sexe = htmlspecialchars($sexe);
        $grade = htmlspecialchars($grade);
  
        enrengistrer_user($nom, $prenom, $username, $contact, $password, $role, $specialite, $sexe, $grade);
    }
  }
?>