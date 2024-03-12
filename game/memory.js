/*
*                   SECTION CREATION ET MELANGES DES CARTES
*/

// Tableau des différents cartes

async function getImages() {
    try {
        const response = await fetch("./game/images/");
        const data = await response.text();

        // Extraire les noms de fichiers des images du HTML de la réponse
        const parser = new DOMParser();
        const htmlDoc = parser.parseFromString(data, "text/html");

        // Filtrer uniquement les fichiers SVG
        const images = Array.from(htmlDoc.getElementsByTagName("a"))
            .filter(img => img.href.match(/\.svg$/))
            .map(img => img.textContent.trim());

        return images;
    } catch (e) {
        console.error('Erreur lors de la récupération des images', e);
        return [];
    }
}

// Appeler la fonction pour obtenir la liste des fichiers SVG
getImages().then(images => {
    // Duplication des cartes
    images = images.concat(images);

    // Mélange les carte avec l'algo de Fisher-Yates
    // https://fr.wikipedia.org/wiki/M%C3%A9lange_de_Fisher-Yates#Description
    for (let i = images.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [images[i], images[j]] = [images[j], images[i]];
    }

    /*
    *                   SECTION DECLARATION DES CONSTANTES
    */

    let CartesSelectionner = [];
    let essaies = 0;
    let matches = 0;
    const essaie = $('#essaie');
    const success = $('#success');
    success.parent().parent().hide();
    const main = $('#main');

    /*
    *                   SECTION AFFICHAGES DES CARTES
    */

    // Création des éléments
    const tableau = $('<div class="tableau">');
    images.forEach(carte => {
        const corps = $(`
            <div class="corps">
                <div class="corps-carte">
                    <div class="face">
                        <h1 class="jouer" data-carte="${carte}">※</h1>
                    </div>
                    <div class="back">
                        <img class="carte face" src="game/images/${carte}">
                    </div>
                </div>
            </div>`);
        tableau.append(corps);
    });
    main.append(tableau);

    essaie.textContent = essaies

    const cartes = $('.jouer');

    cartes.each(function(carte) {
        // Ecoute si on clique sur une carte
        $(this).click(function() {
            commencer()
            CartesSelectionner = selection($(this))
            if (CartesSelectionner.length === 2) {
                // Incrémente le nombre des essaies
                essaies++;
                essaie.text(essaies);
                CartesSelectionner = match(CartesSelectionner)
            }
        });
    });

    function selection(carte) {
        if (carte.hasClass('jouer') && !carte.parent().parent().hasClass('selectionner')) {
            // Ajoute la classe 'selectionner' à la carte selectionné
            carte.parent().parent().addClass('selectionner');
            // Ajoute la carte selectionné dans le tableau des carte selectionner
            CartesSelectionner.push(carte);
        }
        return CartesSelectionner
    }

    function match(CartesSelectionner) {
        const carte1 = CartesSelectionner[0].attr("data-carte");
        const carte2 = CartesSelectionner[1].attr("data-carte");
        // Regarde si les carte selectionner match
        if (carte1 === carte2) {
            // ajoute la classe match aux carte selectionner
            CartesSelectionner.forEach(carte => carte.parent().parent().addClass('match'));
            // vide le tableau des cartes selectionner
            CartesSelectionner = [];
            // incrémente le nombre de matche de cartes
            matches++;
            // Regarde si toutes les cartes ont matchés
            if (matches === (images.length / 2)) {
                pause()
                main.hide()
                success.parent().parent().show()
                success.text(`Félicitations ! Vous avez gagnez en ${chronometre} et en ${essaies} essaies !`);
            }
        } else {
            // retire la classe "selectionner" aux cartes selectionner
            CartesSelectionner.forEach(carte => carte.parent().parent().removeClass('selectionner'));
            CartesSelectionner = [];
        }
        return CartesSelectionner
    }

    /*
    *                   SECTION CHRONOMETRE
    */

    const chrono = $('#chrono');
    let id = null;

    let minutes = 0;
    let secondes = 0;
    let Nbrsecondes = 0;
    var chronometre = '';

    chronometre = calcul(secondes);

    function commencer() {
        if (!id) {
            id = setInterval(update, 1000);
        }
    }

    function update() {
        secondes++
        chronometre = calcul(secondes);
        chrono.text(chronometre);
    }

    function calcul(secondes) {
        minutes = (Math.floor(secondes / 60)) % 60;
        Nbrsecondes = secondes % 60;
        chronometre = `${minutes.toString().padStart(2, '0')}:${Nbrsecondes.toString().padStart(2, '0')}`;
        return chronometre;
    }

    function pause() {
        clearInterval(id);
        id = null;
    }
})