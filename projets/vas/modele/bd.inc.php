<?php
include_once "other.php";

class ConnexionPDO
{
    protected $cnx, $env;
    public function __construct()
    {
        $this->env = parse_ini_file('.env');
        try {
            $this->cnx = new PDO("mysql:host=".$this->env['SERVER'].";dbname=".$this->env['DB'].";charset=UTF8", $this->env['USER'], $this->env['PASSWORD']);
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            gestionErreurSQL($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}