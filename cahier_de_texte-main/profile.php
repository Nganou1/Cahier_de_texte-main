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
    $cours= afficher_cours();
    $grade_specialite = affiche_grade_specialie_for_profile();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profil.css">
    <script src="https://kit.fontawesome.com/2dcb2c25bd.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Profil</title>
<?php include("./header.php") ?>
    <div id="deco_mini">
        
    </div>
    <div id="container_title">
        <h2>Information utilisateur</h2>
    </div>
    <main>
        <section id="container_nom_prenom">
            <div class="icon_profile">
            <object type="image/svg+xml" data="./assets/profile.svg" id="animated-svg" ></object>
            </div>
            <div class="nom">
            <?php foreach($grade_specialite as $grade_spec): ?>
                <h2><?= $grade_spec->NOM ?> <?= $grade_spec->PRENOM ?>  </h2>
            <?php endforeach ?>
            </div>
        </section>
        <section id="container_information">
            <div id="container_spe_grad">
            <?php foreach($grade_specialite as $grade_spec): ?>
                <h3><strong>Specialité: </strong> <?= $grade_spec->LIB_SPECIALITE?></h3>
                <h3><strong>Grade: </strong>  <?= $grade_spec->LIB_GRADE?></h3>
               <?php endforeach ?>
            </div>
            <section>
                <div id="container_username">
                <?php foreach($grade_specialite as $grade_spec): ?>
                    <h3><strong>Nom d'utilisateur:</strong> <?= $grade_spec->username ?> </h3>
                    <?php endforeach ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#exampleModal">Modifier le mot de passe</button>
                </div>
            </section>
            <section class="matiere">
                <h2>Matières</h2>
                <div class="table_container">
                    <table id="coursTable">
                        <thead>
                        <tr>
                            <th>UE</th>
                            <th>Classe</th>   
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cours as $cour): ?>
                                <tr>
                                    <td>
                                        <p><?= $cour->LIB_UE?> </p>
                                    </td>
                                    <td>
                                        <p><?= $cour->LIB_CLASSE ?></p>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </main>
    <div id="deco_big">

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier le mot de passe <span></span> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                
                </button>
            </div>
            <div class="modal-body">
                <form action="/evaluation/sociabilite" id="form-evaluation" method="post">
                <div class="form-group">
                    <label>Mot de passe actuel: </label>
                    <div class="input-group" id="show_hide_password">
                    <input class="form-control" type="password">
                    <div class="input-group-text">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nouveau mot de passe: </label>
                    <div class="input-group" id="show_hide_password">
                    <input class="form-control" type="password">
                    <div class="input-group-text">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });
    </script>
<?php include("./footer.php") ?>