<?php
ob_start();

?>

<section class="addnews ">
	<?php if(isset($errorAddNews)){ echo '<h2>'.$errorAddNews.'</h2>';} ?>
	<h2 class="admTitle">Ajouter une nouvelle :</h2>
	<br />
	<form method="post" action="index.php?action=addNews">
		<label for="title" class="addTitle">Titre : </label><input type="text" name="title" id="title" class="addTitle" /><br /><br />
		<div class="contentAdd"><textarea name="contentNews" id="contentNews" ></textarea></div><br /><br />
		<input type="submit" name="addNews" value="Poster" class="btn btn-primary"/>
	</form>
</section>

<?php
$contentView = ob_get_clean();
require 'vues/common/layout.php';

?>