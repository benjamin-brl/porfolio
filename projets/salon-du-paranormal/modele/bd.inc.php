<?php
include_once "error.php";
class ConnexionPDO {
    protected $login, $mdp, $bd, $serveur, $cnx;
    public function __construct() {
        $this->login = 'srvweb';
        $this->mdp = 'srvweb';
        $this->bd = 'parcours_sdp';
        $this->serveur = 'localhost';
        try {
            $this->cnx = new PDO("mysql:host=$this->serveur;dbname=$this->bd;charset=UTF8", $this->login, $this->mdp);
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}