<?php
ob_start();

foreach($manager->getUnique((int) $_GET['chapter']) as $chapter)
{	
?>

	<section>
		<h3 class="admTitle">Modifier la nouvelle :</h3>
		<form method="post" action="index.php?action=update&chapter=<?= $chapter->id() ?>">
			<input type="hidden" name="idNewsUp" value="<?= $chapter->id() ?>">
			<label for="title">Titre : </label><input type="text" name="title" id="title" value="<?= $chapter->titre() ?>" /><br /><br />
			<textarea name="contentNews" id="contentNews"><?= $chapter->contenu() ?></textarea><br /><br />
			<input type="submit" name="addNews" value="Modifier" class="btnAdd"/>
		</form>
	</section>

<?php
}
$contentView = ob_get_clean();
require 'vues/common/layout.php';
?>