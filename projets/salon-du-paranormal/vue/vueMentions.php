<section>
    <?php foreach($sections as $section => $pannel) { ?>
        <div class="container py-5">
            <h2 id="<?=$section?>"><?=$pannel[0]?></h2>
            <?php if ($section == 'entreprise' || $section == 'hebergeur' || $section == 'edition' ) { ?>
                <div>
                <?php foreach($pannel[1] as $champ => $valeur) { ?>
                    <p id="<?=$champ?>">
                        <?=$valeur[0]?> :
                        <span>
                            <strong>
                                <?=$valeur[1]?>
                            </strong>
                        </span>
                    </p>
                <?php } ?>
                </div>
            <?php } else { ?>
                <p>
                    <?=$pannel[1]?>
                </p>
            <?php } ?>
        </div>
    <?php } ?>
</section>