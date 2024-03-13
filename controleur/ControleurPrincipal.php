<?php
include_once "$racine/modele/other.php";
class ControleurPrincipal {
    private $actions = [
        "accueil" => "accueil.php",
        "projet" => "projet.php",
        "top" => "top.php",
        "about" => "presentation.php",
        "contact" => "contact.php",
        "competence" => "competence.php",
    ];
    public function getAction($action) {
        return [(array_key_exists($action, $this->actions) ? $this->actions[$action] : (new Erreur)->getError(404)), ucfirst($action)];
    }
}