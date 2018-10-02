<?php
ob_start();

require 'lib/autoload.php';

$db = Database::dbconnect();
$manager = new NewsManager($db);

//Modfication
if(isset($_POST['addNews']))
{
	if(!empty($_POST['title'])){

		if(!empty($_POST['contentNews']))
		{
			$newsManager = new NewsManager($db);
			$news = new News(array(
				
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

foreach($manager->getUnique((int) $_GET['chapter']) as $chapter)
{
	
?>

	<section>
		<h3>Modifier la nouvelle :</h3>
		<form method="post" action="index.php?action=update&chapter=<?= $chapter->id() ?>">
			<input type="hidden" name="idNewsUp" value="<?= $chapter->id() ?>">
			<label for="title">Titre : </label><input type="text" name="title" id="title" value="<?= $chapter->titre() ?>" /><br /><br />
			<textarea name="contentNews" id="contentNews"><?= $chapter->contenu() ?></textarea><br /><br />
			<input type="submit" name="addNews" value="Modifier" />
		</form>
	</section>

<?php
}
$contentView = ob_get_clean();
require 'pages/Templates/common/layout.php';
?>