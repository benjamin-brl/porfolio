<?php
include_once "$racine/modele/bd.projet.php";
$Projet = new Projet;

$projet = isset($_GET["p"]) ? $_GET["p"] : '';

$projet_info = !empty($projet) ? $Projet->getProjetByName($projet) : $Projet->getAllProjets();

include_once "$racine/vue/header.php";
include_once "$racine/vue/vueProjet.php";
include_once "$racine/vue/footer.php";