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

		<!-- Title and subtitle -->
		<h1>~Notebook~</h1>
		<p>Write your notes down. Forget nothing.</p>
		
	</header>
	
	<!-- CONTENT -->
	<div id="content">

		<!-- Section 1 -->
		<section class="sections">

			<div class="sectionboxes">
				<div id="front-image">
					<img src="./img/front_image.jpg" alt="Writing on computer" />
				</div>
			</div>

			<!-- Information about the website/app -->
			<div class="sectionboxes information">
				<h2>What is Notebook?</h2>
				<p>Notebook is a place, where you can write down things you need to remember, whether that be what groceries you should buy or a poem you read recently that you dearly want to have near you.</p>
				
				<!-- Register and login -->
				<nav>
					<a id="registerbutton" class="btn" href="#">Register</a>
					<a id="loginbutton" class="btn" href="#">Login</a>
				</nav>

				<?php
					echo registerForm();
					echo loginForm();
				?>
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