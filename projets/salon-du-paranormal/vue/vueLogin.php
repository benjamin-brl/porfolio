<section>
    <div class="container py-5">
        <?php $champs = [
            'mail' => 'Mail',
            'pass' => 'Mot de passe'
        ]; ?>
        <form method="POST" action="<?=$_SERVER['REQUEST_URI']?>" class="row g-3">
            <?php foreach ($champs as $cle => $valeur) {
                $type = ($cle == 'mail' ? 'email' : ($cle == 'pass' ? 'password' : 'text'));
                if ($pageName != 'LoginTeam' || $cle != 'pass') { ?>
                    <div class="form-floating mb-3">
                        <input type="<?= $type ?>" id="<?= $cle ?>" name="<?= $cle ?>" class="form-control" required />
                        <label for="<?= $cle ?>"><?= $valeur ?></label>
                    </div>
            <?php }
            } ?>
            <div class="col-12">
                <button type="submit" class="btn btn-light">Connexion</button>
            </div>
        </form>
    </div>
</section>