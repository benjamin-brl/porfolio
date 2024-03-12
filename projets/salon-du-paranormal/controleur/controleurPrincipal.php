<?php
class ControleurPrincipal {
    private $actions = [
        "accueil" => "Accueil.php",
        "infos" => "Infos.php",
        "inscription" => "Inscription.php",
        "programme" => "Programme.php",
        "sdp" => "Admin.php",
        "team" => "Team.php",
        "login" => "LoginTeam.php",
        "indice" => "Indices.php",
        "contact" => "Contact.php",
        "legale" => "Legale.php",
    ];
    public function getAction($action) {
        return array_key_exists($action, $this->actions) ? $this->actions[$action] : $this->actions["accueil"];
    }
}