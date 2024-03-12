<?php

include("$racine/modele/bd.team.php");
include("$racine/modele/authTeam.php");
$team = new Team;
$authTeam = new authTeam;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$teamName =  strip_tags(trim($_POST["teamName"]));
	$nombreParticipants =  strip_tags(trim($_POST["nombreParticipants"]));
	$teamMail =  strip_tags(trim($_POST["teamMail"]));

	if (isset($_POST['teamMail'])) {
		$teamInfo = $team->getTeamByMail($_POST['teamMail']);
		
		if (empty($teamInfo)) {
			if (isset($_POST['teamName']) && isset($_POST['nombreParticipants'])) {
				$team->createTeam($_POST['teamName'], $_POST['nombreParticipants'], $_POST['teamMail']);
				$authTeam->teamLogin($_POST['teamMail']);
			} else {
				$infos = "Certaines infos sont erronées";
			}
		} else {
			$infos = "Mail déjà utilisé";
		}
	} else {
		header("Location: $_SERVER[REQUEST_URI]");
	}
}

include("$racine/vue/header.php");
include("$racine/vue/vueInscription.php");
include("$racine/vue/footer.php");