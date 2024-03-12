<?php
$sections = [
    'mentions' => ['Mentions légales', 'Mentions légales réglementées par la loi n°78-17 du 6 janvier 1978 relative à l\'informatique, aux fichiers et aux libertés et ainsi que par la loi n° 2004-575 du 21 juin 2004 pour la Confiance dans l\'Économie Numérique.'],

    'edition' => ['Édition du site', [
        'dir_pub' => ['Responsable de la publication', 'Benjamin BARIAL'],
        'lanser' => ['Langage serveur', 'PHP / SQL'],
        'lancli' => ['Langage client', 'HTML / JS / CSS'],
        'log' => ['Logiciel', '<a class="text-light" href="https://www.phpmyadmin.net/" target="_blank">PMA<a>'],
    ]],

    'propriete' => ['Propriété intéllectuelle', 'Tout le contenu présent sur le site <a class="text-light" href="https://'.$domaine.'">'.$domaine.'</a> est la propriété exclusive de l\'association les Frangins et est protégé par les lois françaises et internationales relatives à la propriété intellectuelle.'],

    'liens' => ['Liens externes', 'Les liens hypertextes présentés sur le site en direction de ressources extérieures n\'engagent pas la responsabilité de l\'association les Frangins.'],

    'responsabilite' => ['Responsabilité', 'L\'association les Frangins vérifie l\'exactitude des informations mentionnées sur le site. Cependant, elle n\'offre aucune garantie, qu\'elle soit expresse ou tacite, concernant le contenu de ce site, et ne peut être tenue responsable des dommages directs ou indirects découlant de l\'utilisation de ce site.']
    ];

include "$racine/vue/header.php";
include "$racine/vue/vueMentions.php";
include "$racine/vue/footer.php";