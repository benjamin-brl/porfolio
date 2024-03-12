<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="black" />
    <link rel="icon" type="image/png" href="./assets/favicon.png" />
    <meta property="og:title" content="Salon du Paranormal" />
    <meta property="og:image" content="https://<?= $domaine ?>/image/logo.jpg" />
    <meta property="og:url" content="https://<?= $domaine ?>" />
    <meta property="og:description" content="Bienvenue dans le Salon du Paranormal, êtes vous prêts à résoudre l'énigme qui entoure la Zone 51 ?" />
    <title>Salon du Paranormal | <?= $pageName ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/styles.css" />
</head>

<body class="text-bg-dark p-3 overflow-x-hidden">
    <header>
        <!-- ouais la navbar est pas ouf la le padding est pas bon mais bon -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./" title="Retour à l'accueil">
                    <img id="logo" src="./image/logo2.png" width="15%" alt="Logo Salon du Paranormal">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        if ($pageName == 'Admin') {
                            if ($isAdmin) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="?a=sdp&logout=1">Déconnexion</a>
                                </li>
                        <?php }
                        } ?>
                        <?php
                        if ($pageName == 'Accueil' || $pageName == 'Indices') {
                            if ($mailTeam != '') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="?a=team">Mon équipe</a>
                                </li>
                        <?php }
                        } ?>
                        <?php
                        if ($pageName == 'Team') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="?a=team&logout=1">Déconnexion</a>
                            </li>
                        <?php } ?>
                    </ul>
                    <a target="_blank" href="https://www.facebook.com/profile.php?id=100075826072679" class="btn btn-light">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                        Facebook
                    </a>
                </div>
            </div>
        </nav>
    </header>