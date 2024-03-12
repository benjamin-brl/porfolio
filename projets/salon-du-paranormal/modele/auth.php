<?php
include_once "error.php";

class Auth
{
    function __construct()
    {
        try {
            session_start();
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function login($mail, $pass)
    {
        try {
            $_SESSION['mail'] = $mail;
            $_SESSION['pass'] = $pass;

            // Rediriger vers le lien complet courant
            header("Location: $_SERVER[REQUEST_URI]");
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function logout()
    {
        try {
            unset($_SESSION['mail']);
            unset($_SESSION['pass']);
            session_unset();
            session_destroy();
            setcookie(session_name(), '', time());
            header("Location: /");
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function getLoggedOn()
    {
        try {
            if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
                return [
                    'mail' => $_SESSION['mail'],
                    'pass' => $_SESSION['pass']
                ];
            } else {
                return [
                    'mail' => '',
                    'pass' => ''
                ];
            }
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }

    public function isLoggedOn()
    {
        try {
            return (isset($_SESSION['mail']) && isset($_SESSION['pass'])) ? true : false;
        } catch (PDOException $e) {
            gestionErreurPHP($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
        }
    }
}