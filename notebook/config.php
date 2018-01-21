<?php

	// New database connection
	$servername = "localhost";
	$username = "root";
	$password = "notebook";
	$dbname = "notebook";

	$db = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno()) {
		echo header("Location: ./error.html");
	}

?>