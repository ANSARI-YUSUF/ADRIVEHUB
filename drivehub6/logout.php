<?php
// Logout functionality
session_start();

	if(isset($_SESSION["username"]))
	{
	session_unset();
    session_destroy();
    // Redirect to login page after logout
    header('Location:index.php');
    exit();

	}
	else
	{
	echo "session not set";
    // Destroy the session
	}



?>
