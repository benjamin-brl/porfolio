<!-- <section>
    <?php if (is_array($projet_info)) {
        foreach ($projet_info as $info) { ?>
            <article id="<?= count($projet_info) != 1 ? $info['nom'] : '' ?>" >
                <iframe src="/projets/<?= $info['nom'] ?>"></iframe>
                <div data-markdown="true"><?= !empty($info['description']) ? gzuncompress($info['description']) : '# Pas de description' ?></div>
                <?php if ($cond) { ?> <div id="markdownedit"></div> <?php } ?>
            </article>
        <?php } ?>
    <?php } else { ?>
        <article id="<?= $projet ?>" >
            <iframe src="/projets/<?= $projet ?>"></iframe>
            <div data-markdown="true"><?= !empty($projet_info) ? gzuncompress($projet_info) : '# Pas de description' ?></div>
            <?php if ($cond) { ?> <div id="markdownedit"></div> <?php } ?>
        </article>
    <?php } ?>
</section> -->

<section class="porfolio" id="porfolio">
        <h1 class="heading"> <span> Mes </span> projets </h1>
        <div class="box-container">
            <div class="box">
                <img src="/projets/roulette/favicon.svg">
                <h3> Roulette </h3>
                <div class="icons">
                    <a target="_blank" href="/projets/roulette/" class="fas fa-link"></a>
                    <a target="_blank" href="https://git.s11.fr/22barial/roulette" class="fas fa-search"></a>
                </div>
            </div>

            <div class="box">
                <img src="assets/dolibarrapi.png">
                <h3> DolibarrAPI </h3>
                <div class="icons">
                    <a target="_blank" href="/projets/dolibarr-api/" class="fas fa-link"></a>
                    <a target="_blank" href="https://github.com/benjamin-brl/dolibarr-api" class="fas fa-search"></a>
                </div>
            </div>

            <div class="box">
                <img src="https://raw.githubusercontent.com/benjamin-brl/sub/main/doc/assets/logo.svg">
                <h3> SubModule </h3>
                <div class="icons">
                    <a target="_blank" href="https://github.com/benjamin-brl/sub" class="fas fa-search"></a>
                </div>
            </div>

            <div class="box">
                <img src="/projets/score-resto/images/logo.png">
                <h3> Score Resto </h3>
                <div class="icons">
                    <a target="_blank" href="/projets/score-resto/" class="fas fa-link"></a>
                    <a target="_blank" href="https://github.com/benjamin-brl/score_resto" class="fas fa-search"></a>
                </div>
            </div>

            <div class="box">
                <img src="/projets/salon-du-paranormal/image/logo.jpg">
                <h3> Salon du Paranormal </h3>
                <div class="icons">
                    <a target="_blank" href="/projets/salon-du-paranormal/" class="fas fa-link"></a>
                    <a target="_blank" href="https://git.s11.fr/22barial/parcours_sdp" class="fas fa-search"></a>
                </div>
            </div>
        </div>
    </section>