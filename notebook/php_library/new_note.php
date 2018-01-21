<?php
	include "../config.php";

	// Check if user is logged in
	session_start();
	if (!isset($_SESSION['note_user'])) {  // am I logged on?
	    header("Location: ../notloggedin.html");
	}                                 // if not, go and do it!

	// If the values doesn't exist, go back to dashboard
	if (! (isset($_POST['headline'])) && (isset($_POST['content'])) ) {    
    	header("Location: ../dashboard.php");
    }

    // Variables on names
	$headline = $_POST['headline'];
	$content = $_POST['content'];
	$datePublished = date('Y-m-d H:i:s');
	$note_user = $_SESSION['note_user'];

	// INSERTING INTO DATABASE
	$sql = "INSERT INTO notes(headline, content, datepublished, userid) VALUES ('" . $db->real_escape_string($headline) . "', '" . $db->real_escape_string($content) . "', '" . $datePublished . "', '" . $note_user[userid] . "')";
		
	if(mysqli_query($db, $sql)){
    	header("Location: ../dashboard.php");
	} else {
		header("Location: ../error.html");
	}

	$db->close();
?>