<?php 
 $DB_HOST = 'localhost';
 $DB_USER = 'root';
 $DB_PASSWORD = '';
 $DB_NAME='vacation';
try {
    $access = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME",$DB_USER, $DB_PASSWORD);
    
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connexion etablie";
   
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    die();
}

?>