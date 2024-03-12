<section>
    <div class="container py-5">
        <?php if (!empty($infos)) { ?>
            <h1><?=$infos['cat']?></h1>
            <h5><?=$infos['nom']?> <?=$infos['prenom']?></h5>
            <p><?=$infos['description']?></p>
            <p>Me contacter : <a class="btn btn-light" type="_blank" href="mailto:<?=$infos['mail']?>"><?=$infos['mail']?></a></p>
        <?php } ?>
    </div>
</section>