<?php

$racine = dirname(__FILE__) ;

include_once "$racine/controleur/ControleurPrincipal.php";
$ControleurPrincipal = new ControleurPrincipal;

$fichier = isset($_GET["a"]) ? $ControleurPrincipal->getAction($_GET["a"]) : $ControleurPrincipal->getAction('accueil');

$siteName = 'PorFolio';
$domaine = $_SERVER['SERVER_NAME'];

$js = isset($_COOKIE['jsEnabled']) && $_COOKIE['jsEnabled'] === 'true' ? true : false;

$fichier == null ? include_once "$racine/vue/Error.php?c=404" : include_once "$racine/controleur/$fichier";