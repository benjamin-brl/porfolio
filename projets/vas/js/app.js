/*
 * Gestion des numéros de téléphone
 */
function normaliserNumero(numero) {
  let paquets = [];
  for (let i = 0; i < numero.length; i += 2) {
    let paquet = numero.substring(i, i + 2);
    if (i === 0) {
      paquet = "+33 " + paquet.substring(1);
    }
    paquets.push(paquet);
  }
  return paquets.join(" ");
}

const tels = $("span[data-tel]");
$(tels).each(function() {
  const num = $(this).data("tel");
  $(this).removeAttr("data-tel");
  const numero = normaliserNumero(num);
  $(this).append($(`<a href="tel:${num}"><i class="bi bi-phone"></i>${numero}</a>`));
});

/*
 * Gestion des mails
 */
const mails = $("span[data-mail]");
$(mails).each(function () {
  const m = $(this).data("mail");
  $(this).removeAttr("data-mail");
  $(this).append($(`<a href="mailto:${m}"><i class="bi bi-envelope"></i>${m}</a>`));
});