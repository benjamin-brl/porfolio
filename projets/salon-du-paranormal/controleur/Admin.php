<?php

if ($_SERVER['SCRIPT_FILENAME'] == __FILE__) {
    $racine = '..';
}

include("$racine/modele/bd.admin.php");
include("$racine/modele/bd.indice.php");
include("$racine/modele/auth.php");
include_once "$racine/modele/bd.ip.php";
$getIP = new IP;
$admin = new Admin;
$indice = new Indice;
$auth = new Auth;

// Récupération de l'IP pour tentative d'accès à l'espace admin
$ip_client = $_SERVER['REMOTE_ADDR'];
$getIP->setIP($ip_client);

$login_info = $auth->getLoggedOn();
$mail = $login_info['mail'] != '' ? $login_info['mail'] : '';
$pass = $login_info['pass'] != '' ? $login_info['pass'] : '';
$isAdmin = $admin->isAdmin($mail, $pass);

include "$racine/vue/header.php";
if ($isAdmin) {

    include("$racine/modele/bd.team.php");
    $team = new Team;

    $equipes = $team->getAllTeams();

    // Gestion de la déconnexion (http://$domaine/?a=sdp&logout=1)
    if (isset($_GET['logout']) && $_GET['logout'] == 1) {
        $auth->logout();
    }

    // Appel des affichages
    include "$racine/vue/vueAdmin.php";
    include "$racine/vue/footer.php";
} else {

    include "$racine/vue/vueLogin.php";
    include "$racine/vue/footer.php";
    if (isset($_POST['mail']) && isset($_POST['pass'])) {

        // Récuperation des données
        $champs = [
            'mail' => 'mail',
            'pass' => 'pass'
        ];

        foreach ($champs as $cle => $valeurs) {
            $$valeurs = isset($_POST[$cle]) ? $_POST[$cle] : '';
        }

        extract(compact(array_values($champs)), EXTR_OVERWRITE);
        $mail = strip_tags(trim($mail));
        $pass = strip_tags(trim($pass));
        $auth->login($mail, $pass);
    }
}
