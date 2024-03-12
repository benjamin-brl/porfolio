<?php
include_once "$racine/modele/other.php";
class ControleurPrincipal {
    private $actions = [
        "accueil" => "accueil.php"
    ];
    public function getAction($action) {
        return array_key_exists($action, $this->actions) ? $this->actions[$action] : null;
    }
}