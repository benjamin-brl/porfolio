<?php

class ConnexionPDO {
    protected $cnx;
    public function __construct() {
        $env_file = __DIR__.'\..\.env';
        if (!file_exists($env_file) || !is_readable($env_file)) {
            throw new Exception("Fichier .env érroné ou innacessible");
        }

        $env = parse_ini_file($env_file);

        foreach (['SERVER', 'DB', 'USER', 'PASSWORD'] as $var) {
            if (!array_key_exists($var, $env)) {
                throw new Exception("Variable d'environnement manquante : $var");
            }
        }

        try {
            $this->cnx = new PDO("mysql:host=".$env['SERVER'].";dbname=".$env['DB'].";charset=UTF8", $env['USER'], $env['PASSWORD']);
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            include_once "other.php";
            (new Erreur)->gestionErreurSQL($e->getTrace());
        }
    }
}