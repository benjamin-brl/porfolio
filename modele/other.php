<?php

class Erreur
{
    /** Gère le cas d'erreur SQL en incluant la vue d'erreur et en tuant l'éxécution du script
     * @param array $trace retour direct de $e->getTrace()
     */
    public function gestionErreurSQL(array $trace)
    {
        try {
            include_once "vue/ErrorSQL.php";
            exit;
        } catch (Exception $e) {
            error_log("Erreur de gestionErreurSQL : $e");
            exit;
        }
    }

    /** Gère le cas d'erreur PHP en incluant la vue d'erreur et en tuant l'éxécution du script */
    public function gestionErreurPHP()
    {
        try {
            include_once "vue/ErrorSQL.php";
            exit;
        } catch (Exception $e) {
            error_log("Erreur de gestionErreurPHP : $e");
            exit;
        }
    }

    /** Gère les erreurs forcé par les scripts en incluant la vue d'erreur et en tuant l'éxécution du script
     * @param int $code Code de l'erreur
     */
    public function getError(int $code = 500)
    {
        try {
            include_once "vue/Error.php?c=$code";
            exit;
        } catch (Exception $e) {
            error_log("Erreur de GetError : $e");
            exit;
        }
    }
}

class Encode
{
    /** Encode du texte en base64 de manière friendly avec les URLs
     * @param string $data Données à encoder
     * @return string Données encoder en base64URL
     */
    public function base64URLencode(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    /** Décode du texte en base64URL
     * @param string $data Données à décoder
     * @param bool $strict Par défaut sur false, permet d'ignorer les caractères hors alphabet base64
     * @return string Données décoder
     */
    public function base64URLdecode(string $data, bool $strict = false): string
    {
        return base64_decode(strtr($data, '-_', '+/'), $strict);
    }
}