<?php
function gestionErreurSQL($codeErreur, $message, $fichier, $ligne)
{
    $infos = [
        'Message d\'erreur : ' => $message,
        'Code d\'erreur : ' => $codeErreur,
        'Fichier où se trouve l\'erreur : ' => $fichier,
        'Ligne précise où se trouve l\'erreur : ' => $ligne
    ];
    include "vue/ErrorSQL.php";
    die();
}

function getError($code = 500)
{
    include_once "vue/Error.php";
    die();
}

function ariane($chemin = null)
{
    $chemin = $chemin == null ?  (isset($_SERVER['REQUEST_URI']) ? trim($_SERVER['REQUEST_URI'], '/') : '') : $chemin;
    $fragments = explode('/', $chemin);
    $cheminCourrant = '';
    $res = '';
    foreach ($fragments as $fragment) {
        if (!empty($fragment)) {
            $cheminCourrant .= "$fragment/";
            $fragment = ucfirst($fragment);
            $res .= "<a href='/$cheminCourrant'>$fragment</a> / ";
        } else {
            $res = "<a href='/accueil/'>Accueil</a> /";
        }
    }
    return $res;
}