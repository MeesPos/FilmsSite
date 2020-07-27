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
class OverviewController {

    public function overview() {
        
        $template_engine = get_template_engine();
		echo $template_engine->render('overview');
    }
}