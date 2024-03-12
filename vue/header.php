<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/assets/favicon.svg" type="image/svg+xml" />
    <link rel="stylesheet" href="/css/styles.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title><?= $siteName ?> | <?= $pageName ?></title>
</head>

<body>
    <?php !$js ? include_once "$racine/vue/vueJS.php" : null ?>
    <header>
        <button id="lightningmode"><i class="bi bi-moon-fill"></i></button>
    </header>