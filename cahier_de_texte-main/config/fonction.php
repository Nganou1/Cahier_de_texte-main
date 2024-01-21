<?php 

function enrengistrer_user($nom,$prenom,$username,$contact,$password,$role,$specialite,$sexe,$grade){
    if(require("connexion.php")){
        echo "bnesdq";
        if ($role == 'enseignant') {
            
            $req = $access->prepare('INSERT INTO ENSEIGNANT (ID_SPECIALITE, ID_GRADE, ID_SEXE, NOM, PRENOM, CONTACT) VALUES (?,?,?,?,?,?)');
            $req->execute(array( $specialite, $grade,$sexe,$nom,$prenom,$contact));
            $id_enseignant = $access->lastInsertId(); 
            echo "ok!!";
        } else {
            $id_enseignant = null; 
        }
        
        
        $req = $access->prepare('INSERT INTO utilisateur (username, password, role, id_enseignant) VALUES (?, ?, ?,?)');
        $req->execute(array($username,$password, $role, $id_enseignant
        ));
        $req->closeCursor();
        header("Location: ../enregistrer_user.php");
        exit();
    }
}

function saisie_cours($nom,$prenom,$ue,$classe,$heure_debut,$heure_fin,$contenu){
  session_start();
  $id_enseignant  = $_SESSION['id'];
  $date = date("Y-m-d");

  $debut = DateTime::createFromFormat('H:i', $heure_debut);
  $fin = DateTime::createFromFormat('H:i', $heure_fin);
  $diff = $fin->diff($debut);
  $vol_ens = $diff->h + ($diff->i / 60);

  if(require("connexion.php")){
    $req= $access->prepare('INSERT INTO `enseigner`(`ID_UE`, `ID_CLASSE`, `ID_ENSEIGNANT`, `DATE_ENS`, `DEBUT_ENS`, `FIN_ENS`, `VOL_ENS`, `CONTENU`) VALUES (?,?,?,?,?,?,?,?)');
    $req-> execute(array($ue,$classe,$id_enseignant,$date,$heure_debut,$heure_fin,$vol_ens,$contenu));

    $req->closeCursor();

    header("Location: ../user/cahier_text.php");

  }
}

function connexion_user($username, $password) {
  if (require("connexion.php")) {
    $req = $access->prepare('SELECT password, role , id_user FROM utilisateur WHERE username = ?');
    $req->execute(array($username));
    
    if ($req->rowCount() == 1) {

      $data = $req->fetch(PDO::FETCH_OBJ);
      $mdp = $data->password;
      $id = $data->id_user;
      // $prenom = $data->prenom;
      $role = $data->role;

      if ($mdp == $password) {
        
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['role'] = $role;

        if($role=='Administrateur'){
          header("Location: ../accueil.php");
          exit();
        }else{
          header("Location: ../user/accueil.php");
          exit();
        }
        
      } else {
        header("Location: ../index.php");
        exit();
      }
    }
  }
}



function afficher_grade(){
    if(require("connexion.php"))
  {
    $req=$access->prepare("SELECT * FROM grade ORDER BY ID_GRADE DESC");
    $req->execute();

    $data = $req->fetchAll(PDO::FETCH_OBJ);

    return $data;

    $req->closeCursor();
  }
}
function afficher_cours(){
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $id_connect  = $_SESSION['id'];
  if(require("connexion.php")){
    
    if($_SESSION['role']=="enseignant"){
      $req= $access->prepare('SELECT LIB_CLASSE, LIB_UE , VOL_ENS , DATE_ENS, DEBUT_ENS, FIN_ENS, CONTENU from ue join enseigner on ue.ID_UE = enseigner.ID_UE join classe on classe.ID_CLASSE = enseigner.ID_CLASSE WHERE enseigner.ID_ENSEIGNANT = ?');
      $req->execute(array($id_connect));

      $data = $req->fetchAll(PDO::FETCH_OBJ);

      return $data;
      $req->closeCursor();
    }else{
      
      $req= $access->prepare('SELECT NOM, PRENOM, LIB_UE , VOL_ENS , DATE_ENS, DEBUT_ENS, FIN_ENS, LIB_CLASSE,CONTENU from ue join enseigner on ue.ID_UE = enseigner.ID_UE join classe on classe.ID_CLASSE = enseigner.ID_CLASSE join enseignant on enseignant.ID_ENSEIGNANT= enseigner.ID_ENSEIGNANT');
      $req->execute();

      $data = $req->fetchAll(PDO::FETCH_OBJ);

      return $data;
      $req->closeCursor();
    }
  }
}

function afficher_cours_by_class_id($id_classe){
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $id_connect  = $_SESSION['id'];
  if(require("connexion.php")){
    
    if($_SESSION['role']=="enseignant"){
      
      if($id_classe==0){
        $req= $access->prepare('SELECT LIB_CLASSE, LIB_UE , VOL_ENS , DATE_ENS, DEBUT_ENS, FIN_ENS, CONTENU from ue join enseigner on ue.ID_UE = enseigner.ID_UE join classe on classe.ID_CLASSE = enseigner.ID_CLASSE WHERE enseigner.ID_ENSEIGNANT = ?');
        $req->execute(array($id_connect));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
      }else{
        $req= $access->prepare('SELECT LIB_CLASSE, LIB_UE , VOL_ENS , DATE_ENS, DEBUT_ENS, FIN_ENS, CONTENU from ue join enseigner on ue.ID_UE = enseigner.ID_UE join classe on classe.ID_CLASSE = enseigner.ID_CLASSE WHERE enseigner.ID_CLASSE = ? AND enseigner.ID_ENSEIGNANT = ?');
        $req->execute(array($id_classe,$id_connect));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
      }
    }else{
      $req= $access->prepare('SELECT NOM, PRENOM, LIB_UE , VOL_ENS , DATE_ENS, DEBUT_ENS, FIN_ENS, LIB_CLASSE,CONTENU from ue join enseigner on ue.ID_UE = enseigner.ID_UE join classe on classe.ID_CLASSE = enseigner.ID_CLASSE join enseignant on enseignant.ID_ENSEIGNANT= enseigner.ID_ENSEIGNANT');
      $req->execute();
      $data = $req->fetchAll(PDO::FETCH_OBJ);
      return $data;
      $req->closeCursor();
    }
  }
}


function afficher_sexe(){
    if(require("connexion.php"))
  {
    $req=$access->prepare("SELECT * FROM sexe ORDER BY ID_SEXE DESC");
    $req->execute();

    $data = $req->fetchAll(PDO::FETCH_OBJ);

    return $data;

    $req->closeCursor();
  }
}

function afficher_specialite(){
    if(require("connexion.php"))
  {
    $req=$access->prepare("SELECT * FROM specialite ORDER BY ID_SPECIALITE DESC");
    $req->execute();

    $data = $req->fetchAll(PDO::FETCH_OBJ);

    return $data;

    $req->closeCursor();
  }
}

function afficher_ue(){
  if(require("connexion.php"))
{
  $req=$access->prepare("SELECT * FROM ue ORDER BY ID_UE DESC");
  $req->execute();

  $data = $req->fetchAll(PDO::FETCH_OBJ);

  return $data;

  $req->closeCursor();
}
}
function afficher_classe(){
  if(require("connexion.php"))
{
  $req=$access->prepare("SELECT * FROM classe order by ID_CLASSE DESC");
  $req->execute();

  $data = $req->fetchAll(PDO::FETCH_OBJ);

  return $data;

  $req->closeCursor();
}
}
function affiche_grade_specialie_for_profile(){
  if(require("connexion.php")){
    $req= $access->prepare("SELECT LIB_GRADE, LIB_SPECIALITE, NOM , PRENOM , username from grade JOIN enseignant on grade.ID_GRADE = enseignant.ID_GRADE join specialite on specialite.ID_SPECIALITE = enseignant.ID_SPECIALITE JOIN utilisateur on utilisateur.id_enseignant= enseignant.ID_ENSEIGNANT WHERE enseignant.ID_ENSEIGNANT=?;");
    $req->execute(array($_SESSION['id']));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
  }
}

?>