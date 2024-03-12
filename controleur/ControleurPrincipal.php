<?php
include_once "$racine/modele/other.php";
class ControleurPrincipal {
    private $actions = [
        "accueil" => "accueil.php",
        "projet" => "projet.php",
        "presentation" => "presentation.php",
        "valeur" => "valeur.php",
        "updater" => "updater.php",
        "cookie" => "cookie.php",
        "mentions" => "mentions.php",
    ];
    public function getAction($action) {
        return [(array_key_exists($action, $this->actions) ? $this->actions[$action] : (new Erreur)->getError(404)), ucfirst($action)];
    }
}