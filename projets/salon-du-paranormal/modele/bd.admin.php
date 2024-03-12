<?php
include_once "error.php";

class Admin extends ConnexionPDO
{
    function isAdmin($mail, $pass)
    {
        try {
            $req = $this->cnx->prepare("SELECT estAdmin FROM admin WHERE mail=:mail AND EXISTS (SELECT 1 FROM admin WHERE password=:pass AND mail=:mail)");
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->bindValue(':pass', $pass, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}