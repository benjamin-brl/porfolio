if (typeof (Storage) !== undefined) {
	// LocalStorage est pris en charge.
	// Fonction pour récupérer la préférence de thème depuis le LocalStorage.
	function getTheme() {
		return localStorage.getItem('theme') || 'light';
	}

	// Fonction pour mettre à jour la préférence de thème dans le LocalStorage.
	function setTheme(theme) {
		localStorage.setItem('theme', theme);
	}

	// Initialiser la préférence de thème s'il n'existe pas déjà.
	const theme = getTheme();

	if (theme === 'dark') {
		$(':root').addClass('dark');
	}

	// Attacher l'événement de clic au bouton #lightningmode.
	$('button#lightningmode').click(function (e) {
		e.preventDefault();

		// Inverser la classe du corps pour basculer entre les thèmes.
		$(':root').toggleClass('dark');

		// Mettre à jour la préférence de thème dans le LocalStorage.
		const newTheme = $(':root').hasClass('dark') ? 'dark' : 'light';
		setTheme(newTheme);

		// Inverser l'icône du bouton entre la lune et le soleil.
		$(this).find('i').toggleClass('bi-moon-fill bi-sun-fill');
	});
} else {
	// LocalStorage n'est pas pris en charge.
	console.error("LocalStorage non pris en charge")
}