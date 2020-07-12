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
 * Get the connection with the API
 *
 * @return string
 */
function ApiConnection()
{
	$url = 'https://api.themoviedb.org/3/movie/321?api_key=4f4fc5ebbc928ddfae642382c709683b';

	// HTTP client aanmaken
	$client = new \GuzzleHttp\Client();

	// Request doen
	$response = $client->request('GET', $url);
	$json	  = $response->getBody();

	// JSON omzetten in een array met json_decode()
	$film	= json_decode($json, true);
}

/**
 * Get the popular movies at this moment for Home page 
 * 
 * @return string
 * */
function getHomePopular()
{
	$url = 'https://api.themoviedb.org/3/movie/popular?api_key=4f4fc5ebbc928ddfae642382c709683b';

	$client   = new \GuzzleHttp\Client();
	$response = $client->request('GET', $url);
	$json	  = $response->getBody();

	$popularFilms = json_decode($json, true);
	return $popularFilms;
}

function TestFilm()
{
	require_once '../vendor/autoload.php';
	require_once '../vendor/php-tmdb/api/apikey.php';

	$token = new \Tmdb\ApiToken('4f4fc5ebbc928ddfae642382c709683b');
	$client = new \Tmdb\Client($token);

	$repository = new \Tmdb\Repository\MovieRepository($client);
	$topRated = $repository->getTopRated(array('page' => 3));

	var_dump($topRated);
	return $topRated;
}