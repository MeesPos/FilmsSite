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
	$statement->execute(['username' => $username]);

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

/**
 * Change background image showID on registration or login page.
 * - Enter movieID
 * - Changes database entry in table admin_info based on what form on admin page was used
 * - Default database column is registration_background
 */
function BackgroundChange($movieID, $where = 'registration_background') {
	$connection = dbConnect();

	if ( $where == 'registration_background' ) {
		$sql = 'UPDATE 	`admin_info`
				SET 	`registration_background` = :movieID 
				WHERE 	`id`	 = :id';	
	} else {
		$sql = 'UPDATE 	`admin_info`
				SET 	`login_background` = :movieID 
				WHERE 	`id`	 = :id';	
	}
	

	$statement = $connection->prepare($sql);

	$params = [
		'movieID'	=> $movieID,
		'id' 		=> 1
	];

	$statement->execute($params);
}

/**
 * Retrieves background image showID.
 * - Based on what page you are on
 * 
 * Page choices are:
 * - registration_background
 * - login_background
 */
function getBackground($where) {
	$connection = dbConnect();
	$sql = 'SELECT * FROM `admin_info`';
	$statement = $connection->query($sql);
	
	$background_data = $statement->fetch();

	// Gives show ID from login or registration column to API calling function
	if ( $where === 'registration_background') {
		getBackgroundAndDisplay($background_data['registration_background']);
	} else {
		getBackgroundAndDisplay($background_data['login-background']);
	}

}