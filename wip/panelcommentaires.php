<?php
require 'lib/autoload.php';

$db = Database::dbconnect();
$manager = new CommentManager($db);

require ('header.php');

if(!isset($_SESSION['id']))
{
	header('Location: index.php');
	exit();
}

if(isset($_POST['supprCom']))
{
	$manager->delete((int) $_POST['idCom']);
}

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
				<th>Commentaire</th>
				<th>Date d'ajout</th>
				<th colspan="2">Action</th>
				
			</tr>
		</thead>
		<tbody class="tabBod">
			<?php
				foreach($manager->getList() as $comment)
				{
				?>
					<tr>
						<td><?= $comment->auteur() ?></td>
						<td style=""><?= $comment->contenu() ?></td>
						<td><?= $comment->date_comm() ?></td>
						
						<td>
							<form method="post" action="panelcommentaires.php">
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



require ('footer.php');
?>