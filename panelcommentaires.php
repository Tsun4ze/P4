<?php
require ('config.php');
require ('header.php');

if(!isset($_SESSION['id']))
{
	header('Location: index.php');
	exit();
}



$dataCom = $db->prepare('SELECT id, auteur, contenu, DATE_FORMAT(date_comm, \'%d/%m/%Y à %hH%imin%ss\') AS date_comR FROM comments ORDER BY id DESC');
$dataCom->execute();


?>

<section style="text-align:center;">
	<?php
	if(isset($confirmMsg))
	{
		echo '<p style="color: green;">'.$confirmMsg.'</p>';
	}
	?>
	<h2>Liste de total des commentaires :</h2>

	<table style="width:100%;" class="table-striped table-bordered table-hover">

		<thead class="tabEnt">
			<tr>
				
				<th>Auteur</th>
				<th style="">Commentaire</th>
				<th>Date d'ajout</th>
				<th colspan="2">Action</th>
				
			</tr>
		</thead>
		<tbody class="tabBod">
			<?php
				while($rowCom = $dataCom->fetch())
				{
					?>
			<tr>
				<td><?= $rowCom['auteur']?></td>
				<td style=""><?= $rowCom['contenu'] ?></td>
				<td><?= nl2br(htmlspecialchars($rowCom['date_comR'])) ?></td>
				
				<td>
					<form method="post" action="panelcommentaires_delete.php">
						<input type="hidden" name="idCom" value="<?= $rowCom['id'] ?>" />
						<input type="submit" name="supprCom" value="Supprimer" />
					</form>
				</td>
			</tr>


				<?php
				}
				$dataCom->closeCursor();
				?>
		</tbody>
	</table>
</section>

<?php



require ('footer.php');
?>