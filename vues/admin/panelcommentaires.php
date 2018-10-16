<?php
ob_start();

?>

<section style="text-align:center;" class="">
	<?php
	if(isset($confirmMsg))
	{
		echo '<p style="color: green;">'.$confirmMsg.'</p>';
	}
	?>
	<h2 class="admTitle">Liste de total des commentaires :</h2>

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
							<form method="post" action="index.php?action=gestComs">
								<input type="hidden" name="idCom" value="<?= $comment->id() ?>" />
								<i class="fas fa-eraser"></i>
								<input type="submit" name="supprCom" value="Supprimer" class="btnSuppr" />
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
require 'vues/common/layout.php';
?>