<?php
include_once("$racine/modele/authTeam.php");
include_once("$racine/modele/bd.indice.php");
include_once("$racine/modele/bd.team.php");
$authTeam = new AuthTeam;
$indice = new Indice;
$team = new Team;

$team_info = $authTeam->getTeamLoggedOn();
$mailTeam = $team_info['mailTeam'] != '' ? $team_info['mailTeam'] : '';

if ($mailTeam == '') {
    header('Location: ./?a=login');
}

if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    $authTeam->logout();
}

$all_team_info = $team->getTeamByMail($mailTeam);
// Si le temps de fin est non set
if ($all_team_info['h_fin'] == null || $all_team_info['h_fin'] == '') {
    // Alors on récupère le temps temporaire
    $timeScore = $team->getTimeScoreTmp($all_team_info['id_e']);
// Sinon
} else {
    // On récupère le temps définitif
    $timeScore = $team->getTimeScore($all_team_info['id_e']);
}
// Vérification si le timer de l'équipe n'exède pas 23:59:59
$timeScoreVerif  = $team->verifTimer($timeScore);

// Si le temps de fin n'est pas encore set
if (!$team->checkIfEndTimerSet($all_team_info['id_e'])) {
    // Si timer dépasse 23:59:59 alors on stop le timer
    $timeScoreVerif ? $team->setEndTimer($all_team_info['id_e']) : '' ;
}

$id_indice_recup = $indice->getIndiceIDRecupByTeamID($all_team_info['id_e']);

if (!$all_team_info['success']) {
    include_once("$racine/vue/header.php");
    include_once("$racine/vue/vueTeam.php");
    include_once("$racine/vue/footer.php");
} else if ($all_team_info["success"]) {
    include_once("$racine/vue/header.php");
    include_once("$racine/vue/vueSuccess.php");
    include_once("$racine/vue/footer.php");
}