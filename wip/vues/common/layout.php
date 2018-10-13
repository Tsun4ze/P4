<?php
$session = new Session();
?>

<!DOCTYPE html>
<html>

	<head>

		<title>Un billet simple pour l'Alaska</title>
		<meta charset="utf-8" />

		<link rel="stylesheet" type="text/css" href="Public/css/main.css">
		<link rel="stylesheet" type="text/css" href="Public/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script type="text/javascript" src="Public/tinymce/tinymce.min.js"></script>
		<script>
			tinymce.init({
				selector : 'textarea#contentNews',
				language : 'fr_FR',
				height: 450,
				width: 1200,
				
				resize: 'both',
				plugins: 'advlist autolink textcolor colorpicker emoticons table',
				
			});
		</script>
		
	</head>

	<body>

		<header>
		<?= $session->flash(); ?>
			<nav class="navbar navbar-expand-sm fixed-top mainHeader">
				<div class="nameHeader">
					<h2><a href="./">Jean Forteroche</a></h2>
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
							<h3><a href="index.php?action=allnews" class="nav-link">Les chapitres</a></h3>
						</li>
					</ul>
				</div>
			</nav>

		</header>

		
		<?= $contentView ?>

		<footer class="footer">
			<div class="row" style="margin: auto;">
				<h4 style="margin-left: 5px;"><a href="index.php?action=signup">Administration</a></h4>
				<?php
					if(isset($_SESSION['Adm']))
					{
						echo '<h4 style="margin-left:auto; margin-right:5px;"><a href="index.php?action=dc">Déconnexion</a></h4>';
					}
				?>
			</div>
			
		</footer>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="./public/js/main.js"></script>
	</body>

</html>