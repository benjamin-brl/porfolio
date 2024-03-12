<div class="container py-5">
    <h1>Enquête Extraterrestre à la Zone 51</h1>
    <p class="badge bg-light text-dark text-wrap">1 jour par session (3 jours de disponibilité)</p>
    <p>Une série d'incidents OVNI ont eu lieu dans la région du salon et des preuves suggèrent que quelque chose d'extraordinaire se passe à la Zone 51.
    <p>Êtes-vous prêt à résoudre les énigmes ?</p>
    <p>Formez votre équipe et c'est parti !</p>
    <a href="?a=inscription" class="btn btn-light">Former une équipe</a>
    <a href="?a=login" class="btn btn-light">J'ai déjà une équipe</a>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Cookie</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-dark">
      Nous utilisons aucun cookie
    </div>
  </div>
</div>

<script>
  // Attendez que le document soit prêt
  document.addEventListener("DOMContentLoaded",  e => {
    // Sélectionnez l'élément du toast par son ID
    var toast = document.getElementById("liveToast");

    // Créez un nouvel objet Toast en utilisant Bootstrap
    var toastInstance = new bootstrap.Toast(toast);

    // Affichez le toast dès que la page est chargée
    toastInstance.show();
  });
</script>
