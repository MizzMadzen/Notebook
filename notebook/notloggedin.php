<?php
	include "config.php";
	include "bib.php";
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
	<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
	<link rel="stylesheet" href="css/basic.css">
	<link rel="stylesheet" href="css/header.css">
</head>

<body>
	<!-- Script to make the website fade in on opening it -->
	<!-- Notesnippet used from https://alligator.io/js/simple-page-fade-in/ -->
	<script>document.body.className = 'fade';</script>

	<!-- HEADER -->
	<header>

		<!-- Register and login -->
		<nav>
			<a id="registerbutton" href="#">Register</a>
			<a id="loginbutton" href="#">Login</a>
		</nav>

		<?php
			echo registerForm();
			echo loginForm();
		?>

		<!-- Title and subtitle -->
		<h1>~Notebook~</h1>
		<p>Write your notes down. Forget nothing.</p>
		
	</header>
	
	<!-- CONTENT -->
	<div id="content">

		<!-- Section -->
		<section class="sections">
			<p class="errormessage">Oops! You're not logged in. Log in or register.</p>
			<p class="errormessage"> Or go back to <a href="./index.php">the homepage</a>.</p>
			<div id="imgbox"><img id="error-img" src="./img/error-img.png" alt="notebook" /></div>
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