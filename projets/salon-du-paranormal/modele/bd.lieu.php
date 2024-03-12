<?php
include_once "error.php";
include_once("$racine/modele/bd.inc.php");

class Lieu extends ConnexionPDO {
    function getLieuInfoByID($id_l) {
        try {
            $req = $this->cnx->prepare("SELECT * FROM lieu WHERE id_l=:id_l");
            $req->bindValue(':id_l', $id_l, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}