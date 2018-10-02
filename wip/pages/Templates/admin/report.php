<?php
ob_start();

require 'lib/autoload.php';

$db = Database::dbconnect();
$manager = new CommentManager($db);


/*  */
/* Delete reported comment */
/*  */
if(isset($_POST['supprCom']))
{
	$manager->delete((int) $_POST['idCom']);
}

?>

<section style="text-align:center;" class="simpleSection">
	<?php
	if(isset($confirmMsg))
	{
		echo '<p style="color: green;">'.$confirmMsg.'</p>';
	}
	?>
	<h2>Liste des commentaires reportés :</h2>

	<table style="width:100%;" class="table-striped table-bordered table-hover">

		<thead class="tabEnt">
			<tr>
				
				<th>Auteur</th>
				<th>Commentaire</th>
				<th>Date d'ajout</th>
				<th>Nombre de signalement</th>
				<th colspan="2">Action</th>
				
			</tr>
		</thead>
		<tbody class="tabBod">
			<?php
				foreach($manager->getListReport() as $comment)
				{
				?>
					<tr>
						<td><?= $comment->auteur() ?></td>
						<td style=""><?= $comment->contenu() ?></td>
						<td><?= $comment->date_comm() ?></td>
						<td><?= $comment->report() ?></td>
						<td>
							<form method="post" action="report.php">
								<input type="hidden" name="idCom" value="<?= $comment->id() ?>" />
								<input type="submit" name="supprCom" value="Supprimer" />
							</form>
						</td>
					</tr>


				<?php
				}
				
				?>
		</tbody>
	</table>
</section>

<?php
$contentView = ob_get_clean();
require 'pages/Templates/common/layout.php';
?>