<?php

include "$racine/vue/header.php";

if (isset($_GET["c"])) {
    $pointer = $_GET["c"];
    switch ($pointer) {
        case 'dev':
            $infos = [
                'cat' => 'Dévelopeur',
                'nom'=> 'BARIAL',
                'prenom'=> 'Benjamin',
                'mail' => 'benjamin.barial.pro@gmail.com',
                'description' => 'Bonjour,<br>Je suis étudiant en deuxième année de BTS SIO au lycée Monge à Charleville-Mézières, dans la section SLAM.<br>
                J\'ai travaillé sur le développement du site avec mon collègue Victor TURQUIER, qui est lui aussi en deuxième année de BTS SIO, mais dans la section SISR.<br>
                Nous sommes fiers du travail accompli, d\'autant plus que cela a été réalisé dans un délai très serré.'
            ];
            break;
        
        default:
            header('Location: ./');
            break;
    }
} else {
    header('Location: ./');
}

include("$racine/vue/vueContact.php");
include "$racine/vue/footer.php";