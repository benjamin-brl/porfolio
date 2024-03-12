<?php

$racine = dirname(__FILE__) ;

include_once "$racine/controleur/ControleurPrincipal.php";
$ControleurPrincipal = new ControleurPrincipal;

$domaine = $_SERVER['SERVER_NAME'];

$fichier = isset($_GET["a"]) ? $ControleurPrincipal->getAction($_GET["a"]) : $ControleurPrincipal->getAction('accueil');

$siteName = 'V.A.S';

$infos = [
    'location' => '12 Cr Briand Charleville-Mézières',
    'tel' => '0324337160',
    'mail' => 'contact@vas08.fr'
];

// include_once "$racine/modele/mail.php";
// $a = "benjamin.barial.pro@gmail.com";
// $objet = "Test";
// $message = "test";
// $de = $a;
// $header = "Content-Type: text/plain; charset=utf-8\r\nFrom: $de\r\n";
// mail(to:$a, subject:$objet, message:$message, additional_headers:$header);

include "$racine/controleur/$fichier";