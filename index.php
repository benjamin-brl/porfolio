<?php
$cond = ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1');
$racine = dirname(__FILE__) ;

include_once "$racine/controleur/ControleurPrincipal.php";
$ControleurPrincipal = new ControleurPrincipal;

$fichier = isset($_GET["a"]) ? $ControleurPrincipal->getAction($_GET["a"]) : $ControleurPrincipal->getAction('accueil');

$pageName = $fichier[1];

$siteName = 'PorFolio';
$domaine = $_SERVER['SERVER_NAME'];

$cond =  $fichier[0] == "accueil.php" ? false : true;

include_once "$racine/controleur/$fichier[0]";