<section>
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
</section>