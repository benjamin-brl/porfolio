<?php
include_once "error.php";

class AuthTeam
{
    function __construct()
    {
        try {
            session_start();
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function teamLogin($mail)
    {
        try {
            $_SESSION['mailTeam'] = $mail;

            // Rediriger vers le lien complet courant
            header("Location: ?a=team");
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function logout()
    {
        try {
            unset($_SESSION['mailTeam']);
            session_unset();
            session_destroy();
            setcookie(session_name(), '', time());
            header("Location: /");
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function getTeamLoggedOn()
    {
        try {
            if (isset($_SESSION['mailTeam'])) {
                return [
                    'mailTeam' => $_SESSION['mailTeam'],
                ];
            } else {
                return [
                    'mailTeam' => ''
                ];
            }
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function isTeamLoggedOn()
    {
        try {
            return isset($_SESSION['mailTeam']) ? true : false;
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}