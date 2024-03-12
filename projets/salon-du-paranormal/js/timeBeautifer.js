const timePs = document.querySelectorAll('span#time');
const timeLPs = document.querySelectorAll('span#longtime');

timePs.forEach(timeP => {
    if (timeP.textContent != '' || timeP.textContent != null) {
        timeP.textContent = convertirTemps(timeP.textContent);
    }
});

timeLPs.forEach(timeLP => {
    if (timeLP.textContent != '' || timeLP.textContent != null) {
        timeLP.textContent = convertirDateHeure(timeLP.textContent);
    }
});

function convertirTemps(temps) {
    const tempsArray = temps.split(':');
    const heures = parseInt(tempsArray[0], 10);
    const minutes = parseInt(tempsArray[1], 10);
    const secondes = parseInt(tempsArray[2], 10);

    let resultat = "";

    if (heures > 0) {
        resultat += heures + "h ";
    }

    if (minutes > 0) {
        resultat += minutes + "min ";
    }

    if (secondes > 0) {
        resultat += secondes + "s";
    }

    return resultat;
}

function convertirDateHeure(dateHeure) {
    const dateArray = dateHeure.split(' ')[0].split('-');
    const heureArray = dateHeure.split(' ')[1];

    let jour = dateArray[2];

    if (jour == 27) {
        jour = 'Vendredi'
    } else if (jour == 28) {
        jour = 'Samedi'
    } else if (jour == 29) {
        jour = 'Dimanche'
    }
    const heureFormatee = convertirTemps(heureArray);

    if (jour != undefined) {
        return `${jour} à ${heureFormatee}`;
    }

    return;
}