<?php

require('config.php');
require('header.php');

if(!isset($_SESSION['id']))
{
	header('Location : index.php');
	exit();
}

?>

<section>
	<h3>Panel d'administration :</h3>
	<br />


	<a class="panelRedir" href="panelcommentaires.php">Gestion Commentaires</a>
	<a class="panelRedir" href="addcomment.php">Ajouter une nouvelle</a>
	
	<a class="panelRedir"href="listenews.php">Liste des news</a>
	
	<br />

</section>

<?php

require('footer.php');
?>