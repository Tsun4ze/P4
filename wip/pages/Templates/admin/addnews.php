<?php
ob_start();


require 'lib/autoload.php';
$db = Database::dbconnect();

/* 
if(!isset($_SESSION['id']))
{
	header('Location: index.php');
	exit();
} */

if(isset($_POST['addNews']))
{
	if(!empty($_POST['title'])){

		if(!empty($_POST['contentNews']))
		{
			
			$newsManager = new NewsManager($db);
			$news = new News(array(
				'auteur' => $_SESSION['pseudo'],
				'titre' => $_POST['title'],
				'contenu' => $_POST['contentNews']
			));
			$newsManager->add($news);

			header('Location: listenews.php');
			exit();
		}else{
			$errorAddNews = 'L\'article est vide';
		}
		

	}else{
		$errorAddNews = 'Le titre est manquant';
	}

	
}

?>

<section class="addnews simpleSection">
	<?php if(isset($errorAddNews)){ echo '<h2>'.$errorAddNews.'</h2>';} ?>
	<h3>Ajouter une nouvelle :</h3>
	<form method="post" action="addnews.php">
		<label for="title" class="addTitle">Titre : </label><input type="text" name="title" id="title" class="addTitle" /><br /><br />
		<textarea name="contentNews" id="contentNews"></textarea><br /><br />
		<input type="submit" name="addNews" value="Poster" class="btnAdd"/>
	</form>
</section>

<?php
$contentView = ob_get_clean();
require 'pages/Templates/common/layout.php';

?>