<?php
include_once "bd.inc.php";
include_once "other.php";

class Projet extends ConnexionPDO {
    /**
     * @return array Tous les noms et leurs descriptions des projets
     */
    public function getAllProjets():?array {
        try {
            $req = $this->cnx->prepare('SELECT nom, description FROM projet');
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            (new Erreur)->gestionErreurSQL($e->getTrace());
        }
    }

    /**
     * @param string $name Le nom du projet rechercher
     * @return string La description du projet rechercher
     */
    public function getProjetByName(string $name):?string {
        try {
            $req = $this->cnx->prepare('SELECT description FROM projet WHERE nom = :name');
            $req->bindValue(":name", $name, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['description'];
        } catch (PDOException $e) {
            (new Erreur)->gestionErreurSQL($e->getTrace());
        }
    }

    /**
     * @param string $name Le nom du projet à mettre à jour
     * @param string $description La description du projet à mettre à jour
     * @return null
     */
    public function updateProjectDescriptionByName(string $name, string $description) {
        try {
            $req = $this->cnx->prepare('UPDATE projet SET description = :description WHERE nom = :name');
            $req->bindValue(":name", $name, PDO::PARAM_STR);
            $req->bindValue(":description", $description, PDO::PARAM_STR);
            $req->execute();
        } catch (PDOException $e) {
            (new Erreur)->gestionErreurSQL($e->getTrace());
        }
    }
}