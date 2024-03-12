<?php

include_once("$racine/modele/authTeam.php");
$authTeam = new AuthTeam;

$team_info = $authTeam->getTeamLoggedOn();
$mailTeam = $team_info['mailTeam'] != '' ? $team_info['mailTeam'] : '';

include("$racine/vue/header.php");
include("$racine/vue/vueAccueil.php");
include("$racine/vue/footer.php");