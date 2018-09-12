<?php

require('Database.php');
require('Manager.php');
require('News.php');
require('NewsManager.php');

require('config.php');
require('header.php');

if(!isset($_SESSION['id']))
{
	header('Location: index.php');
	exit();
}

		/*$req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(dateAjout, \'%d%m%Y à %hH%imin%ss\') AS dateAjoutR FROM news WHERE id = :id');
		$req->execute(array(':id' => $_GET['chapter']));
		$row = $req->fetch();
		$req->closeCursor();*/


//Modfication
if(isset($_POST['addNews']))
{
	if(!empty($_POST['title'])){

		if(!empty($_POST['contentNews']))
		{
			$newsManager = new NewsManager();
			$news = new news(array(
				
				'titre' => $_POST['title'],
				'contenu' => $_POST['contentNews'],
				'id' => $_POST['idNewsUp']

			));
			$newsManager->update($news);

		}
		$errorAddNews = 'L\'article est vide';

	}

	$errorAddNews = 'Le titre est manquant';
}

?>

<section>
	<h3>Ajouter une nouvelle :</h3>
	<form method="post" action="updatenews.php">
		<input type="hidden" name="idNewsUp" value="<?= $row['id'] ?>">
		<label for="title">Titre : </label><input type="text" name="title" id="title" value="<?= $row['titre'] ?>" /><br /><br />
		<textarea name="contentNews" id="contentNews"><?= $row['contenu'] ?></textarea><br /><br />
		<input type="submit" name="addNews" value="Modifier" />
	</form>
</section>

<?php
require('footer.php');

?>