<?php
	include "../config.php";

	// Session_start
	session_start();

	// If the values doesn't exist, go back to dashboard
	if (! (isset($_POST['email'])) && (isset($_POST['password'])) ) {    
	    header("Location: ../dashboard.php");
	}

	// Connect 'names' from form with variables
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Login function
	$result = mysqli_query($db, "SELECT * FROM noteusers WHERE email='$email' and password='$password'");

	// Indicates what 'cookie' the session is using
	$userid = $result->fetch_assoc();
	$_SESSION['note_user']=$userid;

	if (mysqli_num_rows($result) != 0) {
			header('Location: ../dashboard.php');
		} else {
			header('Location: ../error.html');
		}

	$db->close();
?>