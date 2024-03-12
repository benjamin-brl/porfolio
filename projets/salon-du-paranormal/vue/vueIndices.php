<section>
    <div class="container py-5">
        <h1><?= $infoLieu['nom'] ?></h1>
        <p><?= $infoLieu['description'] ?></p>
        <form accept-charset="UTF-8" method="POST" action="<?= $_SERVER["REQUEST_URI"] ?>" class="row g-3">
            <?php if ($idLieu != '7bZm5P8KqN') { ?>
                <label class="form-label"><?= $nbrIndices != 1 ? 'Indices' : 'Indice' ?> à renseigner :</label>
                <?php for ($i = 1; $i <= $nbrIndices; $i++) { ?>
                    <input name="indice<?= $i ?>" type="text" placeholder="Indice n°<?= $i ?>" class="form-control" required></input>
                <?php } ?>
                <div class="col-12">
                    <button type="submit" class="btn btn-light">Soumettre</button>
                </div>
                <p><?= !empty($infos) ? $infos : '' ?></p>
            <?php } else if (
                $indice->checkIfIndiceAlreadyCheck(1, $all_team_info['id_e']) &&
                $indice->checkIfIndiceAlreadyCheck(2, $all_team_info['id_e']) &&
                $indice->checkIfIndiceAlreadyCheck(3, $all_team_info['id_e']) &&
                $indice->checkIfIndiceAlreadyCheck(4, $all_team_info['id_e'])
                ) { ?>
                <p>Alors vous avez trouver la réponse à l'énigme ?</p>
                <input name="enigme" type="text" placeholder="Votre réponse" class="form-control" required></input>
                <div class="col-12">
                    <button type="submit" class="btn btn-light">Soumettre</button>
                </div>
                <p><?= !empty($infos) ? $infos : '' ?></p>
            <?php } else { ?>
                <p>Allez chercher tous les indices et revenez nous voir quand vous les aurez tous !!!</p>
            <?php } ?>
        </form>
    </div>
</section>