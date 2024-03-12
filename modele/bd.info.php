<?php
include_once "bd.inc.php";
include_once "other.php";

class Info extends ConnexionPDO {
    /**
     * @return array Tous les titres et leurs descriptions
     */
    public function getAllInfos():?array {
        try {
            $req = $this->cnx->prepare('SELECT titre, description FROM info');
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            (new Erreur)->gestionErreurSQL($e->getTrace());
        }
    }

    /**
     * @param string $titre Titre de la description
     * @return string Description rechercher par le titre
    */
    public function getInfoByTitle(string $titre):?string {
        try {
            $req = $this->cnx->prepare('SELECT description FROM info WHERE titre = :titre');
            $req->bindValue(":titre", $titre, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['description'];
        } catch (PDOException $e) {
            (new Erreur)->gestionErreurSQL($e->getTrace());
        }
    }

    /**
     * @param string $title Titre de la section info à mettre à jour
     * @param string $description La description à mettre à jour
     * @return null
     */
    public function updateInfotDescriptionByTitle(string $title, string $description) {
        try {
            $req = $this->cnx->prepare('UPDATE info SET description = :description WHERE titre = :titre');
            $req->bindValue(":titre", $title, PDO::PARAM_STR);
            $req->bindValue(":description", $description, PDO::PARAM_STR);
            $req->execute();
        } catch (PDOException $e) {
            (new Erreur)->gestionErreurSQL($e->getTrace());
        }
    }
}