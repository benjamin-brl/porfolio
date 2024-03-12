<?php
include_once "$racine/modele/other.php";
class ControleurPrincipal {
    private $actions = [
        "accueil" => "Accueil.php",
        "presentation" => "Presentation.php",
    ];
    public function getAction($action) {
        return array_key_exists($action, $this->actions) ? $this->actions[$action] : getError(404);
    }
}