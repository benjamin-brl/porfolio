<?php
include_once "error.php";
include_once("$racine/modele/bd.inc.php");

class Indice extends ConnexionPDO {
    function getIndiceIDRecupByTeamID($id) {
        try {
            $req = $this->cnx->prepare("SELECT id_i FROM recuperer WHERE id_e=:id_e");
            $req->bindValue(':id_e', $id, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    function getIndiceInfoByID($id) {
        try {
            $req = $this->cnx->prepare("SELECT labelle, description, chemin FROM indice WHERE id_i=:id_i");
            $req->bindValue(':id_i', $id, PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    function getIndiceIDByIDl($id_l) {
        try {
            $req = $this->cnx->prepare("SELECT id_i FROM indice WHERE id_l=:id_l");
            $req->bindValue(':id_l', $id_l, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['id_i'];
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    function setIndiceCheck($id_i, $id_e) {
        try {
            $req = $this->cnx->prepare("INSERT INTO recuperer (id_i, id_e) VALUES (:id_i, :id_e)");
            $req->bindValue(':id_e', $id_e, PDO::PARAM_INT);
            $req->bindValue(':id_i', $id_i, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    function checkIfIndiceAlreadyCheck($id_i, $id_e) {
        try {
            $req = $this->cnx->prepare("SELECT * FROM recuperer WHERE id_e=:id_e AND id_i=:id_i");
            $req->bindValue(':id_e', $id_e, PDO::PARAM_INT);
            $req->bindValue(':id_i', $id_i, PDO::PARAM_INT);
            $req->execute();
            if (!empty($req->fetch(PDO::FETCH_ASSOC))) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    function getCountsOfIndicesRecup()
    {
        try {
            $req = $this->cnx->prepare('SELECT COUNT(*) as CountIndices FROM recuperer');
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['CountIndices'];
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    function getCountOfIndiceRecupByTeamID($id) {
        try {
            $req = $this->cnx->prepare("SELECT COUNT(id_i) as indice FROM recuperer WHERE id_e=:id_e");
            $req->bindValue(':id_e', $id, PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['indice'];
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}