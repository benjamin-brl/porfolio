<section>
    <div class="container py-5">
        <h1>Mes indices récupérés</h1>
        <p>Mon équipe : <?= $all_team_info['pseudo'] ?></p>
        <?= $timeScoreVerif ? '<p class="badge bg-danger text-dark text-wrap">Votre temps est dépassé</p>' : '' ?>
        <p class="badge bg-light text-dark text-wrap">Votre temps : <?= $timeScore ?></p>
        <div>
            <?php foreach ($id_indice_recup as $indice_recup) {
                $info_indice = $indice->getIndiceInfoByID($indice_recup['id_i']);
                if (!empty($info_indice)) { ?>
                    <div class="card" style="width: 18rem;">
                        <img src="./image/<?= $info_indice['chemin'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $info_indice['labelle'] ?></h5>
                            <p class="card-text"><?= $info_indice['description'] ?></p>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
        <?= empty($id_indice_recup) ? "<p>Vous n'avez encore récupéré aucun indice</p>" : "" ?>
    </div>
</section>
<?php

$timeString1 = "345:54:12";
$timeString2 = "23:59:59";

list($hours1, $minutes1, $seconds1) = explode(":", $timeString1);
list($hours2, $minutes2, $seconds2) = explode(":", $timeString2);

if ($hours1 > $hours2) {
    return true;
} elseif ($hours1 < $hours2) {
    return false;
} else {
    // Les heures sont égales, vérifiez les minutes.
    if ($minutes1 > $minutes2) {
        return true;
    } elseif ($minutes1 < $minutes2) {
        return false;
    } else {
        // Les minutes sont égales, vérifiez les secondes.
        if ($seconds1 > $seconds2) {
            return true;
        } elseif ($seconds1 < $seconds2) {
            return false;
        } else {
            return false;
        }
    }
}


?>