<?php
// Model functions
// In dit bestand zet je ALLE functions die iets met data of de database doen

function getUsers() {
	$connection = dbConnect();
	$sql        = "SELECT * FROM `users`";
	$statement  = $connection->query( $sql );

	return $statement->fetchAll();
}

/**
 * Checks if user is registered.
 * - Email based
 * - Returns rowcount
 */
function isUserRegisteredCheck($email) {
	$connection = dbConnect();
	$sql			= 'SELECT * FROM `users` WHERE `email` = :email';
	$statement 		= $connection->prepare($sql);
	$statement->execute(['email' => $email]);

	return ($statement->rowCount() === 0);
}

/**
 * Checks if username already exists.
 * - Username based
 * - Returns rowcount
 */
function isUsernameRegisteredCheck($username) {
	$connection = dbConnect();
	$sql			= 'SELECT * FROM `users` WHERE `username` = :username';
	$statement 		= $connection->prepare($sql);
	$statement->execute(['email' => $username]);

	return ($statement->rowCount() === 0);
}

/**
 * Put userdata in new row in database. 
 * Table: users
 */
function createUser($user_data) {
	$connection = dbConnect();

	$sql = 'INSERT INTO `users` ( `email`, `username`, `password`)
			VALUES ( :email, :username, :password )';

	$statement = $connection->prepare($sql);

	$safe_password = password_hash($user_data['password'], PASSWORD_DEFAULT);
	$params = [
		'email' 	=> $user_data['email'],
		'username'	=> $user_data['username'],
		'password'	=> $safe_password
	];

	$statement->execute($params);
}

/**
 * Log user in.
 * - Email based
 * - Gets user information and puts it in SESSION (user_id)
 * - Starts session
 */
function logUserIn($email) {
	$connection = dbConnect();
	$sql			= 'SELECT * FROM `users` WHERE `email` = :email';
	$statement 		= $connection->prepare($sql);
	
	$param = [
		'email' => $email
	];
	$statement->execute($param);

	$userinfo = $statement->fetch();

	session_start();
	$_SESSION['user_id'] = $userinfo['id'];
}