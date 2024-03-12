<section>
    <div class="container py-5">
        <form method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>" class="row g-3">
            <div class="col-md-6">
                <label for="teamName" class="form-label">Nom de l'équipe :</label>
                <input name="teamName" id="teamName" value="" type="text" minlength="3" maxlength="50" placeholder="Choisissez un nom pour votre équipe" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="nombreParticipants" class="form-label">Nombre de membre dans votre équipe :</label>
                <input name="nombreParticipants" id="nombreParticipants" value="" type="number" maxlength="2" min="1" max="99" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="teamMail" class="form-label">Mail de l'équipe :</label>
                <input name="teamMail" id="teamMail" value="" type="email" minlength="3" maxlength="50" placeholder="Choisissez le mail de votre équipe" class="form-control" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-light">Créer l'équipe</button>
            </div>
        </form>
        <p><?= !empty($infos) ? $infos : '' ?></p>
    </div>
</section>