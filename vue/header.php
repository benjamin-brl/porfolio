<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/assets/favicon.svg" type="image/svg+xml" />
    <link rel="stylesheet" href="/css/styles.css" />
    <link rel="stylesheet" href="/css/bootstrap-icons.min.css">
    <script src="/js/showdown.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <title><?= $siteName ?> | <?= $pageName ?></title>
</head>

<body>
    <noscript class="nojs-container">
        <div class="nojs-card">
            <div class="nojs-card-body">
                <h1 class="nojs-card-title">JavaScript est désactivé</h1>
                <p class="nojs-card-text">
                    Veuillez activer JavaScript pour que le site soit pleinement fonctionnel.
                </p>
            </div>
        </div>
    </noscript>
    <header>
        <nav>
            <ul>
                <li>
                    <div class="menu-left">
                        <a href="/"><img src="/assets/favicon.svg" /></a>
                        <a href="/accueil">Accueil</a>
                    </div>
                </li>
                <li>
                    <a href="/presentation">Présentation</a>
                </li>
                <ul>
                    <a href="/projet">Projets</a>
                    <li>
                        <a href="/projet/score-resto">Score Resto</a>
                    </li>
                    <li>
                        <a href="/projet/roulette">Roulette</a>
                    </li>
                    <li>
                        <a href="/projet/salon-du-paranormal">Salon du Paranormal</a>
                    </li>
                    <li>
                        <a href="/projet/vas">V.A.S</a>
                    </li>
                </ul>
            </ul>
        </nav>
        <div id="pourcent"></div>
        <button id="lightningmode"><i class="bi bi-moon-fill"></i></button>
    </header>
    <div id="svg-container" class="bg"></div>