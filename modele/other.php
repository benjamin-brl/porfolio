<?php
function gestionErreurSQL($codeErreur, $message, $fichier, $ligne)
{
    $infos = [
        'Message d\'erreur : ' => $message,
        'Code d\'erreur : ' => $codeErreur,
        'Fichier où se trouve l\'erreur : ' => $fichier,
        'Ligne précise où se trouve l\'erreur : ' => $ligne
    ];
    include_once "vue/ErrorSQL.php";
    die();
}
