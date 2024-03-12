<?php

$code = isset($_GET['c']) ? $_GET['c'] : '';

switch ($code) {
    case '301':
        $description = 'Redirection d\'URL permanente';
        $commentaire = 'La ressource demandé a déménagé dernièrement !';
        break;
    case '302':
        $description = 'Redirection d\'URL temporaire';
        $commentaire = 'La ressource demandé a pris ces congés ! Elle revient bientôt !';
        break;
    case '400':
        $description = 'Requête incorrecte';
        $commentaire = 'Oups ! Il semblerait que ce que vous cherchez n\'existe pas.';
        break;
    case '401':
        $description = 'Non autorisé';
        $commentaire = 'Comme maître Oogway à dit :<br>Mieux vaut tard que tartare !';
        break;
    case '403':
        $description = 'Accès interdit';
        $commentaire = 'Nan nan ! Vous ne rentrez pas !';
        break;
    case '404':
        $description = 'Page non trouvée';
        $commentaire = 'Oups ! Sherlock enquête sur cette mystérieuse page disparu !';
        break;
    case '500':
        $description = 'Erreur interne du serveur';
        $commentaire = 'Le serveur est un peu fatigué, revenez plus tard';
        break;
    case '666':
        $description = 'SATAN';
        $commentaire = 'Vade retro satana';
        break;
    default:
        $description = 'Erreur inconnue';
        $commentaire = 'Bah ça alors ! On me l\'avais jamais fait celle là !!';
        break;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/favicon.svg" type="image/svg+xml" />
    <title> Porfolio | Erreur <?= $code ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 20px;
            text-align: center;
        }

        h1 {
            font-size: 32px;
            color: #333;
        }

        p {
            font-size: 18px;
            color: #666;
        }
    </style>
</head>

<body>
    <section class="container">
        <h1>Erreur <?= $code ?></h1>
        <p><?= $description ?></p>
        <img alt="<?= $description ?>" height="700px" src="https://http.cat/<?=$code?>"/>
        <p><?= $commentaire ?></p>
    </section>
</body>

</html>