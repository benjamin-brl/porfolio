<?php

include_once "$racine/modele/bd.user.php";
$User = new User;

$users = $User->getAllUser();

$pageName = "Accueil";

include_once "$racine/vue/header.php";
include_once "$racine/vue/vueAccueil.php";
include_once "$racine/vue/footer.php";