<?php
include_once "bd.inc.php";
include_once "other.php";

class Info extends ConnexionPDO {
    function getAllInfos() {
        try {
            $req = $this->cnx->prepare('SELECT * FROM info ');
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            gestionErreurSQL($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}