<?php $cond = ($_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1') ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/favicon.svg" type="image/svg+xml" />
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
            color: #333;
        }

        li:first-child {
            margin-top: -.8em;
        }

        <?php } else { ?>
        h1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 32px;
            color: #333;
        }

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
            <ul>
                <?php foreach ($infos as $cle => $valeur) { ?>
                    <li><?= $cle . $valeur ?></li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <h1>Maintenance</h1>
            <p>Le site est actuellement en maintenance.<br>Petit memory pour faire passer le temps ?</p>
        <?php } ?>
    </div>
</body>

</html>