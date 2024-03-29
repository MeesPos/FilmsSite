<?php

namespace Website\Controllers;

/**
 * Class WebsiteController
 *
 * Deze handelt de logica van de homepage af
 * Haalt gegevens uit de "model" laag van de website (de gegevens)
 * Geeft de gegevens aan de "view" laag (HTML template) om weer te geven
 *
 */
class WebsiteController {

	public function home() {

		$movieGet = getHomePopular();
		$genreList = getGenreList();

		$template_engine = get_template_engine();
		echo $template_engine->render('homepage', ['popMovies' => $movieGet, 'genreLists' => $genreList]);

	}

	public function api(){

		$template_engine = get_template_engine();
		echo $template_engine->render('api');
	}

}