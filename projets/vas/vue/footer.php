        <footer>
            <form>
                <label for="nom">Nom :</label>
                <input name="nom" id="nom" placeholder="Votre nom" type="text"/>
                <label for="email">Email :</label>
                <input name="email" id="email" placeholder="Votre email" type="mail"/>
                <label for="objet">Objet :</label>
                <input name="objet" id="objet" placeholder="Objet" type="text"/>
                <label for="message">Message :</label>
                <textarea maxlength="2000" minlength="1" name="message" id="message" placeholder="Votre message"></textarea>
                <p>Nombres de caractères <span id="cnt_chr"></span>/2000</p>
                <input type="submit">
            </form>
        </footer>
        <script src="/js/app.js"></script>
    </body>
</html>