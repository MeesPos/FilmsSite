<?php
// Dit bestand hoort bij de router, enb bevat nog een aantal extra functiesdie je kunt gebruiken
// Lees meer: https://github.com/skipperbent/simple-php-router#helper-functions
require_once __DIR__ . '/route_helpers.php';

// Hieronder kun je al je eigen functies toevoegen die je nodig hebt
// Maar... alle functies die gegevens ophalen uit de database horen in het Model PHP bestand

/**
 * Verbinding maken met de database
 * @return \PDO
 */
function dbConnect()
{

	$config = get_config('DB');

	try {
		$dsn = 'mysql:host=' . $config['HOSTNAME'] . ';dbname=' . $config['DATABASE'] . ';charset=utf8';

		$connection = new PDO($dsn, $config['USER'], $config['PASSWORD']);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		return $connection;
	} catch (\PDOException $e) {
		echo 'Fout bij maken van database verbinding: ' . $e->getMessage();
		exit;
	}
}

/**
 * Geeft de juiste URL terug: relatief aan de website root url
 * Bijvoorbeeld voor de homepage: echo url('/');
 *
 * @param $path
 *
 * @return string
 */
function site_url($path = '')
{
	return get_config('BASE_URL') . $path;
}

function get_config($name)
{
	$config = require __DIR__ . '/config.php';
	$name   = strtoupper($name);

	if (isset($config[$name])) {
		return $config[$name];
	}

	throw new \InvalidArgumentException('Er bestaat geen instelling met de key: ' . $name);
}

/**
 * Hier maken we de template engine en vertellen de template engine waar de templates/views staan
 * @return \League\Plates\Engine
 */
function get_template_engine()
{

	$templates_path = get_config('PRIVATE') . '/views';

	return new League\Plates\Engine($templates_path);
}

/**
 * Geef de naam (name) van de route aan deze functie, en de functie geeft
 * terug of dat de route is waar je nu bent
 *
 * @param $name
 *
 * @return bool
 */
function current_route_is($name)
{
	$route = request()->getLoadedRoute();

	if ($route) {
		return $route->hasName($name);
	}

	return false;
}

/**
 * Get the popular movies at this moment for Home page 
 * 
 * @return string
 * */
function getHomePopular()
{
	$url = 'https://api.themoviedb.org/3/movie/popular?api_key=4f4fc5ebbc928ddfae642382c709683b&language=en-US';

	$client   = new \GuzzleHttp\Client();
	$response = $client->request('GET', $url);
	$json	  = $response->getBody();

	$popularFilms = json_decode($json, true);
	// print_r($popularFilms);
	return $popularFilms;
}

/**
 * Get Genrelist
 *
 * @return string
 */
function getGenreList()
{
	$url = 'https://api.themoviedb.org/3/genre/movie/list?api_key=4f4fc5ebbc928ddfae642382c709683b&language=en-US';

	$client   = new \GuzzleHttp\Client();
	$response = $client->request('GET', $url);
	$details  = $response->getBody();

	$genres = json_decode($details, true);
	// print_r($genres);
	return $genres;
}

/**
 *  Validates form, returns either an error message or POST data in an array.
 * 
 * Checks:
 * - Password length
 * - If valid email was entered
 * - If password and repeat password are the same
 * - If an input field was left open.
 */
function registrationFormValidation($post_data, $errors) {
	$data = [];

	// Checking whether an input field was left open. (In case someone removes required from html input)
	foreach ( $post_data as $data_item) {
		if ( ! isset($data_item) ) {
			$errors['empty'] = 'Please fill in all fields.';
			// If error, return and exit. Otherwise PHP errors.
			return [
				$data,
				$errors
			];
		}
	}

	// Get information form post
	$email		= filter_var($post_data['email'], FILTER_VALIDATE_EMAIL);
	$password	= trim($post_data['password']);

	// Putting other POST data in variables for easy storage
	$rePassword	= trim($post_data['repeat-password']);
	$username	= $post_data['username'];

	// Check if unvalid email has been entered
	if ( $email === false ) {
		$errors['email'] = 'Please enter a valid email.';
	}

	// Check if password is 8 characters or more
	if ( strlen($password) < 8 ) {
		$errors['password'] = 'Please enter a password that is 8 or more characters.';
	}

	// Check if password and repeated password are equal
	if ( ! $password === $rePassword ) {
		$errors['password-repeat'] = "Your entered passwords don't match.";
	}

	$data = [
		'email' 	 => $email,
		'password' 	 => $password,
		'rePassword' => $rePassword,
		'username'	 => $username	
	];

	return [
		$data,
		$errors
	];

}

/**
 * Gets registration background image
 * - ID of show or movie based on IMDB id!
 * - Get IMDB id from url of movie or show
 * - Returns backdrop path of image
 */
function getRegistrationBackground($show_id) {

	$url = 'https://api.themoviedb.org/3/find/' . $show_id . '?api_key=4f4fc5ebbc928ddfae642382c709683b&external_source=imdb_id';

	$client   = new \GuzzleHttp\Client();
	$response = $client->request('GET', $url);
	$details  = $response->getBody();

	$movie_result = json_decode($details, true);

	return $movie_result['movie_results'][0]['backdrop_path'];
	

}