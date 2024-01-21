<?php 
session_start();
if (isset($_SESSION['role'])){
    $_SESSION['role'] = array();
    $_SESSION['id'] = array();

    session_destroy();

    header("Location:../index.php");
}

?>