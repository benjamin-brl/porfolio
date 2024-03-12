<?php
$racine = dirname(__FILE__);

mb_internal_encoding("UTF-8");
include_once "$racine/controleur/controleurUserAgent.php";
$verifIP = new verifIP;

// ! Vérifie si l'IP n'est pas sur liste noire
$ip_client = $_SERVER['REMOTE_ADDR'];
$ok = $verifIP->verif($ip_client);
if ($ok) {
    // ! Vérifie si l'IP ne fait pas une tentative de DDOS ou de DOS
    $verifIP->writeIPLog($ip_client);
    $ifSpam = $verifIP->ifIPSpam($ip_client);
    if (!$ifSpam) {
        // Si l'IP est saint alors on poursuit
        include_once "$racine/controleur/controleurPrincipal.php";
        $controleur = new ControleurPrincipal;
        $domaine = $_SERVER['SERVER_NAME'];
        isset($_GET["a"]) ? $fichier = $controleur->getAction($_GET["a"]) : $fichier = $controleur->getAction("accueil");
        $pageName = pathinfo($fichier)['filename'];
        include "$racine/controleur/$fichier";
    } else {
        include_once "$racine/modele/bd.ip.php";
        $getIP = new IP;
        // ! Si l'IP est suspecté de spam alors on l'ajoute dans la liste noire
        // et on inclue la vue pour les bots
        $getIP->setIPBan($ip_client);
        include "$racine/vue/vueBot.php";
    }
} else {
    // ! Si l'IP est dans la liste noire,
    // alors on inclue la vue pour les bots
    include "$racine/vue/vueBot.php";
}