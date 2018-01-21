<?php
include "config.php";

session_start();
if (!isset($_SESSION['note_user'])) {  // am I logged on?
    header("Location: ./notloggedin.php");
}                                 // if not, go and do it!
?>

<!DOCTYPE html>

<html>
<head>
	<!-- Title -->
	<title>Notebook - Write your notes down. Forget nothing.</title>

	<!-- Meta Data -->
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<meta charset="UTF-8">
	<meta name="description" content="Notebook - Write your notes down. Forget nothing.">
	<meta name="author" content="Mariann Madsen">

	<!-- CSS Links -->
	<link rel="stylesheet" href="css/basic.css">
</head>

<body>
	<!-- Script to make the website fade in on opening it -->
	<!-- Notesnippet used from https://alligator.io/js/simple-page-fade-in/ -->
	<script>document.body.className = 'fade';</script>

	<!-- HEADER -->
	<header>

		<!-- Top links -->
		<nav>
			<form id="logout-form" action="php_library/logout.php">Hello,
					<?php
						$note_user = $_SESSION['note_user'];
						$sql = mysqli_query($db, "SELECT * FROM noteusers WHERE userid=$note_user[userid]");
						$username = $sql->fetch_assoc();

						if ($username) {
							echo $username['username'] . $db->error;
						} else {
							echo "user";
						}
					?>
				<input type="Submit" id="logout" value="Log out">
			</form>
		</nav>

		<!-- Title and subtitle -->
		<h1>~Notebook~</h1>
		<p>Write your notes down. Forget nothing.</p>
		
	</header>
	
	<!-- CONTENT -->
	<div id="content">

		<!-- Section 1 -->
		<section id="section1" class="sections">
				
				<h2 id="yournotes">Your Notes</h2>
				<a class="addnewnote" href="#section2">Add New Note</a>


				<!-- Notes -->
				<div class="notebox">
				<?php

					$note_user = $_SESSION['note_user'];
					$result = mysqli_query($db, "SELECT * FROM notes LEFT JOIN noteusers ON notes.userid = noteusers.userid WHERE notes.userid = '$note_user[userid]' ORDER BY DatePublished DESC");

					// Checking for rows
					if ($result->num_rows > 0) {

					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					    	$noteDate = date("j M", strtotime($row["datepublished"]));
					    	$noteYear = date("Y", strtotime($row["datepublished"]));
					    	$noteid = $row['noteid'];
					        echo "<div onmouseover='showNotebuttons()' class='note'><div class='notedatebox'><p class='notedate'>" . $noteDate. "</p><p class='noteyear'>". $noteYear ."</p></div><h3>" . $row["headline"]. "</h3><p class='notecontent'>" . nl2br($row["content"]) . "<div class='notebuttons'><a class='editbutton' href='edit.php?id=" . $noteid . "'>Edit</a><a onclick='return confirmDelete()' href='php_library/delete.php?id=" . $noteid . "'>Delete</a></div></div>";
					    }
					} else {
				    	echo "No notes added yet! <a href='#section2'>Add one now</a>.";
					}
				$db->close();
				?>

				</div>
		</section>

		<!-- SECTION 2 -->
		<section id="section2" class="sections">

			<div class="sectionboxes addnew">

				<!-- Add New Note -->
				<h2>Add new note</h2>
				<p>Need to remember more things? No problem. Add new note below.</p>

				<form method="POST" action="php_library/new_note.php">
					<p>Headline</p>
					<input type="text" name="headline" required>
					
					<p>Content</p>
					<textarea name="content" required></textarea>
					
					<input class="submit-button" type="submit" name="submit" value="Submit">
				</form>

			</div>

			<!-- Information about the website/app -->
			<div class="sectionboxes information">
				<h2>What is Notebook?</h2>
				<p>Notebook is a place, where you can write down things you need to remember, whether that be what groceries you should buy or a poem you read recently that you dearly want to have near you.</p>
			</div>

		</section>
		
		<div class="push"></div>
	</div><!-- End of Content -->

	<!-- FOOTER -->
	<footer><p>Copyright 2017</p></footer>

	<!-- Script to make the website fade in on opening it -->
	<!-- Notesnippet used from https://alligator.io/js/simple-page-fade-in/ -->
	<script>
		document.addEventListener("DOMContentLoaded", function(e) {
			document.body.className = '';
		});
	</script>

	<!-- JavaScript Link -->
	<script src="js/effects.js"></script>

</body>
</html>