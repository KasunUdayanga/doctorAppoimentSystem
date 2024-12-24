<?php 
	//This function starts the session, allowing the script to access any existing session data.
	session_start();

	//The session array $_SESSION is cleared, removing all stored session variables.
	//This essentially logs out the user by erasing their session data (like user authentication details).
	$_SESSION = array();

	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-86400, '/');
	}

	//This completely terminates the session on the server, ensuring no further access to the user's session data.
	session_destroy();

	//After logging out, the user is redirected to the login page (login.php). 
	//The URL includes a query parameter (action=logout), 
	//which can be used to show a logout confirmation message on the login page.
	header('Location: login.php?action=logout');

 ?>