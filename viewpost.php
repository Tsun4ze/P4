<?php
require('config.php');
require('header.php');

$viewDataB = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(dateAjout, \'%d%m%Y à %hH%imin%ss\') AS dateAjoutR FROM news WHERE id = :id');
		$viewDataB->execute(array(':id' => $_GET['chapter']));
		$rowVS = $viewDataB->fetch();

if(!isset($rowVS['id']))
{
	header('Location: ./404.php');
	exit;
}

?>

	<section style="text-align: center;">
	<?php
	echo'
		<div>
			<h1>'.$rowVS['titre'].'</h1>
			<p>Posted on '.$rowVS['dateAjoutR'].'</p>
			<br />
			<p>'.$rowVS['contenu'].'</p>
		</div>';

	$viewDataB->closeCursor();
	?>

	</section>
	
<?php

include('viewcomment.php');
include('insertcomment.php');
require('footer.php');
?>