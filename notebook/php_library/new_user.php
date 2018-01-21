<?php
	include "../config.php";

	// If the values doesn't exist, go back to index.php
	if (! (isset($_POST['username'])) && (isset($_POST['email'])) && (isset($_POST['password'])) ) {
		header("Location: ../index.php");
	}

	// Connect 'names' from form with variables
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Insert entered data in database
	$result = mysqli_query($db, "INSERT INTO noteusers(email, username, password) VALUES ('" . $db->real_escape_string($email) . "', '" . $db->real_escape_string($username) . "', '" . $db->real_escape_string($password) . "')");

	if($result){
		echo '<script language="javascript">confirm("Project details have been updated! You can now log in.")</script>';
		echo "<script>setTimeout(\"location.href = '../index.php';\",500);</script>";
	} else{
		echo '<script language="javascript">confirm("Something went wrong. Try again.")</script>';
		echo "<script>setTimeout(\"location.href = '../index.php';\",500);</script>";
	}

	$db->close();
?>