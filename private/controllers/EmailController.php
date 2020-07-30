<?php

namespace Website\Controllers;

/**
 * Class EmailController
 *
 * Deze handelt de logica van de admin pagina's af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class EmailController {

	public function sendTestEmail() {
		$mailer = getSwiftMailer();

		$message = createEmailMessage('Donaldtrump@hotmail.com', 'Dit is een test-email', 'WMNM', 'cornellbvanders@gmail.com');
		$message->setBody('Inhoud van test bericht!');

		$aantal_verstuurd = $mailer->send($message);
		echo "Aantal = " . $aantal_verstuurd;
	}
	
}

