        <footer>
            <p><?= $siteName ?> © - 2023</p>
            <p><a href="/mentions-legales">Mentions légales</a></p>
            <p><a href="/cookie">Cookies</a></p>
            <address>
                <p>Mail : <a href="mailto:benjamin.barial.pro@gmail.com">benjamin.barial.pro@gmail.com</a></p>
                <p>Téléphone : <a href="tel:0649203803">06-49-20-38-03</a></p>
            </address>
        </footer>
        <script src="/js/cookie.js"></script>
        <script src="/js/svg.js"></script>
        <script src="/js/darklightmode.js"></script>
        <script src="/js/app.js" defer></script>
        <?php $cond ? include_once "$racine/vue/vueJSAdmin.php" : "" ?>
    </body>

</html>