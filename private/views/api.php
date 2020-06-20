<?php
$url = 'https://api.themoviedb.org/3/movie/9836?api_key=4f4fc5ebbc928ddfae642382c709683b';

// HTTP client aanmaken
$client = new \GuzzleHttp\Client();

// Request doen
$response = $client->request('GET', $url);
$json	  = $response->getBody();

// JSON omzetten in een array met json_decode()
$country_info	= json_decode($json, true);
print_r($country_info);