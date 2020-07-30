<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace( 'Website\Controllers' );

SimpleRouter::group( [ 'prefix' => site_url() ], function () {

	// START: Zet hier al eigen routes
	// Lees de docs, daar zie je hoe je routes kunt maken: https://github.com/skipperbent/simple-php-router#routes

	// Homepage
	SimpleRouter::get( '/', 'WebsiteController@home' )->name( 'home' );
	SimpleRouter::get( '/api', 'WebsiteController@api' )->name( 'api' );

	// Registration & Login
	SimpleRouter::get( '/registration', 'RegistrationLoginController@registerHome' )->name( 'register-home' );
	SimpleRouter::post( '/registrationProcessing', 'RegistrationLoginController@registerProcessing' )->name( 'register-processing' );
	SimpleRouter::get('/send-test-email', 'EmailController@sendTestEmail')->name( 'email.test');
	// Admin
	SimpleRouter::get( '/admin', 'AdminController@AdminHome' )->name( 'admin-home' );
	SimpleRouter::post( '/backgroundChange', 'AdminController@BackgroundChange' )->name( 'admin-bgchange' );


	// STOP: Tot hier al je eigen URL's zetten
	SimpleRouter::get( '/not-found', function () {
		http_response_code( 404 );

		return '404 Page not Found';
	} );

} );


// Dit zorgt er voor dat bij een niet bestaande route, de 404 pagina wordt getoond
SimpleRouter::error( function ( Request $request, \Exception $exception ) {
	if ( $exception instanceof NotFoundHttpException && $exception->getCode() === 404 ) {
		response()->redirect( site_url() . '/not-found' );
	}

} );

