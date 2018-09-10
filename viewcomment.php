<?php


$viewCom = $db->prepare('SELECT id, news, auteur, contenu, DATE_FORMAT(date_comm, \'%d/%m/%Y à %hH%imin\') AS date_commentaire FROM comments WHERE news = ? ORDER BY date_commentaire ');
$viewCom->execute(array($_GET['chapter']));
while($rowCom = $viewCom->fetch())
{
?>

<section class="commentary">

	
		<div>
			<h3><?= $rowCom['auteur'] ?></h3>
			<p>Posted on <?= $rowCom['date_commentaire'] ?></p>
			<br />
			<p><?= $rowCom['contenu'] ?></p>
		</div>

		<div>
			<form action="signalement.php" method="post">
				<input type="hidden" name="idComment" value="<?= $rowCom['id'] ?>" />
				<input type="submit" name="report" value="Signaler" />
			</form>
		</div>
		
	

</section>

<?php
}
$viewCom->closeCursor();
?>