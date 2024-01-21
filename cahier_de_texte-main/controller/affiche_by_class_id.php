<?php
// fetch_cours.php

require("../config/fonction.php");

// Récupérer la classe sélectionnée
$classeId = $_POST['classeId'];

// Récupérer les cours en fonction de la classe sélectionnée
$cours =  afficher_cours_by_class_id($classeId);

// Générer le contenu HTML pour les cours
$html = '';
foreach ($cours as $cour) {
    $html .= '<tr>';
    $html .= '<td>' . $cour->LIB_UE . '</td>';
    $html .= '<td>' . $cour->LIB_CLASSE . '</td>';
    $html .= '<td>' . $cour->DEBUT_ENS . '</td>';
    $html .= '<td>' . $cour->FIN_ENS . '</td>';
    $html .= '<td>' . $cour->DATE_ENS . '</td>';
    $html .= '<td>' . $cour->VOL_ENS . '</td>';
    $html .= '<td>' . $cour->CONTENU . '</td>';
    $html .= '</tr>';
}

// Envoyer le contenu HTML en réponse
echo $html;
?>
