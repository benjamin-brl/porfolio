<?php
include_once("$racine/modele/authTeam.php");
include_once("$racine/modele/bd.team.php");
$authTeam = new AuthTeam;
$team = new Team;

$team_info = $authTeam->getTeamLoggedOn();
$mailTeam = $team_info['mailTeam'] != '' ? $team_info['mailTeam'] : '';

if ($mailTeam != '') {
    header('Location: ?a=team');
}

if (isset($_POST['mail'])) {
    // Récuperation des données
    $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
    $mail = strip_tags(trim($mail));

    $infoTeam = $team->getTeamByMail($mail);
    if (!empty($infoTeam)) {
        $authTeam->teamLogin($mail);
    } else {
        $infos =  "Mail inexistant ou erreur lors de la saisie";
    }
}
$infos =  "";

include("$racine/vue/header.php");
include("$racine/vue/vueLogin.php");
include("$racine/vue/footer.php");