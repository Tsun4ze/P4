<?php
session_start();
?>
<!DOCTYPE html>
<html>

	<head>

		<title>Un billet simple pour l'Alaska</title>
		<meta charset="utf-8" />

		<link rel="stylesheet" type="text/css" href="public/css/main.css">
		<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
		<script type="text/javascript" src="public/tinymce/tinymce.min.js"></script>
		<script>
			tinymce.init({
				selector : 'textarea#contentNews',
				language : 'fr_FR'
				
			});
		</script>
		
	</head>

	<body>

		<header>

			<nav class="navbar navbar-expand-sm fixed-top mainHeader">
				<div class="nameHeader">
					<h2><a href="index.php">Jean Forteroche</a></h2>
				</div>

				<div class="listeHeader">
					<ul class="nav listeItem">
						<li class="nav-item">
							<h3><a href="#" class="nav-link">Auteur</a></h3>
						</li>
						<li class="nav-item">
							<h3><a href="#" class="nav-link">Contact</a></h3>
						</li>
						<li class="nav-item">
							<h3><a href="allpost.php" class="nav-link">Les chapitres</a></h3>
						</li>
					</ul>
				</div>
			</nav>

			
			
			
		</header>