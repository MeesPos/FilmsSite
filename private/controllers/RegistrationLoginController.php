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
		$users = getUsers();
		print_r($users);

		$template_engine = get_template_engine();
		echo $template_engine->render('registration');

	}
	public function registerProcessing() {
		
		$errors = [];

		$registrationFormValidationResult = registrationFormValidation($_POST, $errors);

		// No validation errors -> continue
		if ( count($registrationFormValidationResult['errors']) === 0) {

			// If email not registered -> continue
			if(isUserRegisteredCheck($registrationFormValidationResult['data']['email'])) {

				// If username not registered -> continue
				if(isUsernameRegisteredCheck($registrationFormValidationResult['data']['username'])) {

					createUser($registrationFormValidationResult['data']);
					logUserIn($registrationFormValidationResult['data']['email']);

					$overviewURL = url('testRegistration'); // ANCHOR URl needs to be changed
					redirect($overviewURL);

					exit;

				} else {
					$registrationFormValidationResult['errors']['username'] = 'This username already exists.';
				}

			} else {
				$registrationFormValidationResult['errors']['email'] = 'This email adress already exists.';
			}

		}

		// If errors -> return to registration page with error messages
		$template_engine = get_template_engine();
		echo $template_engine->render('registration', ['errors' => $registrationFormValidationResult['errors']]);

	}

	
}

