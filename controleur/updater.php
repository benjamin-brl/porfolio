<?php

$source_encode = isset($_GET["src"]) ? trim(strip_tags($_GET["src"])) : '';

if (!empty($source_encode)) {
	$source_decode = (new Encode)->base64URLdecode($source_encode);
	$projet_description = isset($_POST["description"]) ? trim($_POST["description"]) : '';
	include_once "$racine/modele/bd.projet.php";
	!empty($projet_description) ? (new Projet)->updateProjectDescriptionByName(explode('/', $source_decode)[2], gzcompress($projet_description)) : null;
	header("Location: $source_decode");
} elseif (!empty($projet_description)) {
	(new Info)->updateInfotDescriptionByTitle("", gzcompress($projet_description));
	header("Location: /accueil#$c");
} else {
	header("Location: /");
}