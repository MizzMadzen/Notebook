<?php
	include "config.php";

	// Session start and checking if user is logged in
	session_start();
	if (!isset($_SESSION['note_user'])) {
	    header("Location: ./notloggedin.php");
	}

	// Get the noteid
	$id=$_GET['id'];

	// Update note
	$result = mysqli_query($db, "SELECT * FROM notes WHERE noteid='$id'");
	$row = $result->fetch_assoc();
	$headline = $row['headline'];
	$content = $row['content'];

?>

<!DOCTYPE html>

<html>
<head>
	<!-- Title -->
	<title>Notebook - Write your notes down. Forget nothing.</title>

	<!-- Meta Data -->
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
			<?php
				if(isset($_POST['edit'])) {
					$editheadline = $_POST['editheadline'];
    				$editcontent = $_POST['editcontent'];
					$datePublished = date('Y-m-d H:i:s');
					$update = mysqli_query($db, "UPDATE notes LEFT JOIN noteusers ON notes.userid = noteusers.userid SET headline='" . $db->real_escape_string($editheadline) . "', content='" . $db->real_escape_string($editcontent) . "', datepublished='" . $db->real_escape_string($datePublished) . "' WHERE noteid='" . $id . "'");

					if($update) {
						header("Location: ./dashboard.php");
					} else {
						echo "Meh!" . $db->error;
					}
				}

				$db->close();
			?>
			
			<!-- Edit Note Layer -->
			<div id="editpage">
				<h2>Edit your note</h2>
				
				<div id="editbox">
					<form method="POST" action="">
						<p>Headline</p>
						<input type="text" name="editheadline" value="<?php echo $headline;?>" required>
					
						<p>Content</p>
						<textarea name="editcontent" required><?php echo $content;?></textarea>
						
						<input class="submit-button" type="submit" name="edit" value="Edit">
						<p id="goback">Or go back <a href="dashboard.php">to dashboard</a></p>
					</form>
				</div>
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