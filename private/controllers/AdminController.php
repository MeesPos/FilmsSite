<?php

namespace Website\Controllers;

/**
 * Class AdminController
 *
 * Deze handelt de logica van de admin pagina's af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class AdminController {

	public function AdminHome() {

		$template_engine = get_template_engine();
		echo $template_engine->render('admin');

	}

	public function BackgroundChange() {

		// Based on background change form used, POST data name changes.
		// This code recognises which page needs to be changed and alters function.
		if ( isset($_POST['registrationMovieID']) ) {
			backgroundChange($_POST['registrationMovieID']);
		} else {
			backgroundChange($_POST['loginMovieID'], 'login_background');
		}

		$template_engine = get_template_engine();
		echo $template_engine->render('admin');

	}
	
}

