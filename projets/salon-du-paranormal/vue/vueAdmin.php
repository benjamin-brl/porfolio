<?php
$champs = [
    "id_e" => "ID",
    "pseudo" => "Nom",
    "nbr_p" => "Nombre de participants",
    "h_crea" => "Date de création",
    "h_fin" => "Date de fin",
    "success" => "Gagnant",
]
?>

<div class="container py-5">
    <section>
        <h1>Adminstration</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <?php foreach ($champs as $champ) { ?>
                        <th><?= $champ ?></th>
                    <?php } ?>
                    <th>Temps éffectué</th>
                    <th>Indice récupérer</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($equipes as $equipe) { ?>
                    <tr>
                        <?php foreach ($champs as $champ => $valeur) { ?>
                            <td>
                                <?php switch ($champ) {
                                    case "success":
                                        echo ($equipe[$champ] == 1) ? "Gagnant" : "Perdant";
                                        break;

                                    case "h_crea":
                                        echo '<span id="longtime">' . $equipe[$champ] . '<span>';
                                        break;

                                    case "h_fin":
                                        echo '<span id="longtime">' . $equipe[$champ] . '<span>';
                                        break;

                                    default:
                                        echo $equipe[$champ];
                                } ?>
                            </td>
                        <?php } ?>
                        <td>
                            <span id="time">
                                <?= $team->getTimeScore($equipe['id_e']) ?>
                            </span>
                        </td>
                        <td>
                            <?= $indice->getCountOfIndiceRecupByTeamID($equipe['id_e']) ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        Nombre d'équipes différentes
                    </th>
                    <th>
                        Nombre de participants
                    </th>
                    <th>
                        Nombre d'indices récupérer aux total
                    </th>
                    <th>
                        Nombre d'indices récupérer en moyenne par équipe
                    </th>
                    <th>
                        Temps moyen par équipe victorieuse
                    </th>
                    <th>
                        Nombre d'équipes gagnantes
                    </th>
                    <th>
                        Ratio V/D
                    </th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>
                        <?= $team->getCountsOfTeams() ?>
                    </td>
                    <td>
                        <?= $team->getCountsOfParticipants() ?>
                    </td>
                    <td>
                        <?= $indice->getCountsOfIndicesRecup() ?>
                    </td>
                    <td>
                        <?= round(($team->getCountsOfTeams() / $indice->getCountsOfIndicesRecup()), 2) ?>
                    </td>
                    <td>
                        <span id="time"><?php
                                        $totalSeconds = 0; // Initialisation du total en secondes
                                        $count = 0;

                                        foreach ($equipes as $equipe) {
                                            $timeScore = $team->getTimeScore($equipe['id_e']);
                                            if ($equipe['success'] == 1) {
                                                list($hours, $minutes, $seconds) = explode(":", $timeScore);

                                                // Conversion du temps en secondes et ajout au total
                                                $totalSeconds += ($hours * 3600) + ($minutes * 60) + $seconds;
                                                $count++;
                                            }
                                        }

                                        // Calcul du temps moyen en secondes
                                        if ($count != 0) {
                                            $averageSeconds = round(($totalSeconds / $count));
                                        } else {
                                            $averageSeconds = $totalSeconds;
                                        }

                                        // Conversion du temps moyen en format "HH:MM:SS"
                                        $averageHours = floor($averageSeconds / 3600);
                                        $averageMinutes = floor($averageSeconds / 60) % 60;
                                        $averageSeconds = floor($averageSeconds % 60);
                                        $averageTime = sprintf("%02d:%02d:%02d", $averageHours, $averageMinutes, $averageSeconds);

                                        echo $averageTime;
                                        ?>
                        </span>
                    </td>
                    <td>
                        <?= $team->getCountsOfWinTeams() ?>
                    </td>
                    <td>
                        <?= round(($team->getCountsOfWinTeams() /  $team->getCountsOfDefeatTeams()), 2) ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</div>