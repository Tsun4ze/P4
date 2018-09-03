<?php


$viewCom = $db->prepare('SELECT news, auteur, contenu, DATE_FORMAT(date_comm, \'%d/%m/%Y à %hH%imin%ss\') AS date_commentaire FROM comments WHERE news = ? ORDER BY date_commentaire ');
$viewCom->execute(array($_GET['chapter']));
while($rowCom = $viewCom->fetch())
{
?>

<section style="text-align: right;">

	<?php
		echo '
		<div>
			<h3>'.$rowCom['auteur'].'</h3>
			<p>Posted on '.$rowCom['date_commentaire'].'</p>
			<br />
			<p>'.$rowCom['contenu'].'</p>
		</div>';

			
	?>	

</section>

<?php
}
$viewCom->closeCursor();
?>