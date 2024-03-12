<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/styles.css" />
    <link rel="icon" type="image/svg+xml" href="/assets/logo_VAS.svg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title><?= $siteName ?> | <?= $pageName ?></title>
</head>

<body>
    <header id="header">
        <div>
            <div>
                <span>
                    <span data-tel="<?= $infos['tel'] ?>"></span>
                    <span data-mail="<?= $infos['mail'] ?>"></span>
                </span>
                <span>
                    <a href="https://google.com/maps/search/<?= $infos['location'] ?>" target="_blank"><i class="bi bi-map"></i><?= $infos['location'] ?></a>
                </span>
            </div>
            <nav>
                <div>
                    <ul>
                        <li>
                            <a href="/accueil">Vers L'Autonomie du Sujet</a>
                            <a href="/presentation">Présentation</a>
                            <a href="/valeurs">Nos valeurs</a>
                            <a href="/sessad">SESSAD</a>
                            <a href="/histoire">Histoire</a>
                            <a href="/handicap-rare">Handicap rare</a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="/horaires">Vie quotidienne</a>
                            <a href="/horaires">Horaires</a>
                            <a href="/calendriers">Calendriers</a>
                            <a href="/menus">Menus</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>