<?php
include_once "error.php";
include_once "bd.inc.php";

class Team extends ConnexionPDO
{
    function createTeam($pseudo, $nbr_p, $mail)
    {
        try {
            $req = $this->cnx->prepare("INSERT INTO equipe (pseudo, nbr_p, h_crea, mail) VALUES (:pseudo, :nbr_p, NOW(), :mail)");
            $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $req->bindValue(':nbr_p', $nbr_p, PDO::PARAM_INT);
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->execute();
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    function getCountsOfTeams()
    {
        try {
            $req = $this->cnx->prepare('SELECT COUNT(*) as CountTeams FROM equipe ');
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['CountTeams'];
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    function getAllTeams()
    {
        try {
            $req = $this->cnx->prepare('SELECT id_e, pseudo, nbr_p, h_crea, h_fin, success FROM equipe');
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    function getTimeScore($id)
    {
        try {
            $req = $this->cnx->prepare('SELECT TIMEDIFF(h_fin, h_crea) AS timeScore FROM equipe WHERE id_e=:id_e');
            $req->bindValue(':id_e', $id, PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['timeScore'];
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    function getTimeScoreTmp($id)
    {
        try {
            $req = $this->cnx->prepare('SELECT TIMEDIFF(NOW(), h_crea) AS timeScore FROM equipe WHERE id_e=:id_e');
            $req->bindValue(':id_e', $id, PDO::PARAM_INT);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['timeScore'];
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    function getTeamByMail($mail)
    {
        try {
            $req = $this->cnx->prepare('SELECT * FROM equipe WHERE mail=:mail');
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    function verifTimer($time)
    {
        try {
            list($heures1, $minutes1, $secondes1) = explode(":", $time);
            list($heures2, $minutes2, $secondes2) = explode(":", "23:59:59");
            if ($heures1 > $heures2) {
                return true;
            } elseif ($heures1 < $heures2) {
                return false;
            } elseif ($minutes1 > $minutes2) {
                return true;
            } elseif ($minutes1 < $minutes2) {
                return false;
            } elseif ($secondes1 > $secondes2) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    function setEndTimer($id)
    {
        try {
            $req = $this->cnx->prepare('UPDATE equipe SET h_fin = NOW() WHERE id_e = :id_e');
            $req->bindValue(':id_e', $id, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    function checkIfEndTimerSet($id)
    {
        try {
            $req = $this->cnx->prepare("SELECT h_fin FROM equipe WHERE id_e=:id_e");
            $req->bindValue(':id_e', $id, PDO::PARAM_INT);
            $req->execute();
            $res = $req->fetch(PDO::FETCH_ASSOC)['h_fin'];
            if (!empty($res) && $res != null && $res != '') {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    function setSuccessTeam($id)
    {
        try {
            $req = $this->cnx->prepare('UPDATE equipe SET success = 1 WHERE id_e = :id_e');
            $req->bindValue(':id_e', $id, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    function getCountsOfWinTeams()
    {
        try {
            $req = $this->cnx->prepare('SELECT COUNT(*) as CountWinTeams FROM equipe WHERE success = 1');
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['CountWinTeams'];
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
    function getCountsOfDefeatTeams()
    {
        try {
            $req = $this->cnx->prepare('SELECT COUNT(*) as CountDefeatTeams FROM equipe WHERE success = 0');
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['CountDefeatTeams'];
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    function getCountsOfParticipants()
    {
        try {
            $req = $this->cnx->prepare('SELECT SUM(nbr_p) as CountParticipants FROM equipe ');
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['CountParticipants'];
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}
