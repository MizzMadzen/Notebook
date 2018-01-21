<?php
	include "../config.php";

	// Session start
	session_start();

	$id=$_GET['id'];

	// Deleting the note
	$result = mysqli_query($db, "DELETE FROM notes WHERE noteid='$id'");

	if ($result) {
		header("Location: ../dashboard.php");
	} else {
		header("Location: ../error.html");
	}

	$db->close();
?>