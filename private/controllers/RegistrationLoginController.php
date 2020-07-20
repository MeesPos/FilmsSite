<?php

namespace Website\Controllers;

/**
 * Class RegistrationLoginController
 *
 * Deze handelt de logica van de registratie en login pagina's af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class RegistrationLoginController {

	public function registerHome() {

		$template_engine = get_template_engine();
		echo $template_engine->render('registration');

	}

	
}

