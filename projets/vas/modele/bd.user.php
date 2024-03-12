<?php

include_once "other.php";
include_once "bd.inc.php";

class User extends ConnexionPDO
{
    public function getAllUser()
    {
        try {
            $req = $this->cnx->prepare("SELECT * FROM user");
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            gestionErreurSQL($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}