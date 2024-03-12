<?php $cond = ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1') ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/favicon.svg" type="image/svg+xml" />
    <?php if (!$cond) { ?>
        <link rel="stylesheet" href="/game/memory.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <?php } ?>
    <title><?= $cond ? 'Erreur SQL' : 'Maintenance' ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 20px;
            text-align: left;
        }

        <?php if ($cond) { ?>
        ul {
            list-style-type: none;
        }

        li {
            font-size: 18px;
            margin-left: -2em;
            color: #666;
        }

        li:first-child {
            margin-top: -.8em;
        }

        <?php } else { ?>
        p {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 18px;
            color: #666;
        }

        <?php } ?>
    </style>
</head>

<body>
    <div class="container">
        <?php if ($cond) { ?>
            <?php foreach ($trace as $element) {
                foreach ($element as $key => $value) { ?>
                    <ul>
                        <?php if ($key == "args") { ?>
                            <?php foreach ($value as $arg) { ?>
                                <li><?= $arg ?></li>
                            <?php }
                        } else { ?>
                            <li><?= ucfirst($key) ?> : <?= $value ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <br>
            <?php } ?>
        <?php } else { ?>
            <h1 class="title">Maintenance</h1>
            <p>Le site est actuellement en maintenance.<br>Petit memory pour faire passer le temps ?</p>
            <div id="main">
                <div class="block">
                    <div class="cadre">
                        <h2>Chronomètre</h2>
                        <div class="chronometre">
                            <p id="chrono">00:00</p>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="cadre">
                        <h2>Essais</h2>
                        <div class="chronometre">
                            <p id="essaie">0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="success">
                <div class="block">
                    <p class="cadre" id="success"></p>
                    <input class="button" type="button" value="Rejouer" onclick="location.reload()"></input>
                </div>
            </div>
            <script src="./game/memory.js"></script>
        <?php } ?>
    </div>
</body>

</html>