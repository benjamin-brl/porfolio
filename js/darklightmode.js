if (typeof (Storage) !== undefined) {
	// LocalStorage est pris en charge.
	// Fonction pour récupérer la préférence de thème depuis le LocalStorage.
	function getTheme() {
		try {
			return localStorage.getItem('theme') || 'light';
		} catch (error) {
			console.error(error)
		}
	}

	// Fonction pour mettre à jour la préférence de thème dans le LocalStorage.
	function setTheme(theme) {
		try {
			localStorage.setItem('theme', theme);
		} catch (error) {
			console.error(error)
		}
	}

	// Initialiser la préférence de thème s'il n'existe pas déjà.
	if (getTheme() === 'dark') {
		$(':root').addClass('dark');
	}

	// Attacher l'événement de clic au bouton #lightningmode.
	$('button#lightningmode').click(function (e) {
		e.preventDefault();

		// Inverser la classe du corps pour basculer entre les thèmes.
		$(':root').toggleClass('dark');

		// Mettre à jour la préférence de thème dans le LocalStorage.
		setTheme($(':root').hasClass('dark') ? 'dark' : 'light');

		// Inverser l'icône du bouton entre la lune et le soleil.
		$(this).find('i').toggleClass('bi-moon-fill bi-sun-fill');
	});
} else {
	// LocalStorage n'est pas pris en charge.
	console.error("LocalStorage non pris en charge")
}