    <footer class="py-2 text-white bg-dark">
        <div class="container fixed-bottom py-2">
            <div class="footer-content text-center">
                <p class="footer-text mb-0">Un événement organisé par l'association
                    <a target="_blank" class="btn btn-light" href="https://www.facebook.com/assolesfrangins08">Les Frangins</a>
                </p>
            </div>
            <div class="footer-content text-center">
                <p class="footer-text mb-0">&copy; <?= date("Y") ?> - <a class="text-light" href="?a=contact&c=dev">Dev</a> - <a class="text-light" href="?a=legale">Mentions Légales</a></p>
            </div>
        </div>
    </footer>
    <?php if ($pageName == "Team" || $pageName == "Admin") { ?>
        <script type="text/javascript" src="./js/timeBeautifer.js"></script>
    <?php } ?>
    </body>

    </html>