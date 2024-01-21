<?php 
require("../config/fonction.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  
    if (!empty($username) && !empty($password) ) {
         
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        connexion_user($username,$password);
    }
  }
?>