<?php 
ob_start();

?>

<section class="simpleSection">
	<h2 class="admTitle">Liste de total des news :</h2>

	<table style="width:100%;" class="table-bordered table-striped">

		<thead class="tabEnt">
			<tr>
				
				
				<th style="">Titre</th>
				<th>News</th>
				<th>Date d'ajout</th>
				<th colspan="2">Action</th>
				
			</tr>
		</thead>
		<tbody class="tabBod">
			<?php
				foreach($manager->getList() as $news)
				{
					?>
			<tr style="text-align: center;">
				<td style="text-decoration: underline; width: 20%;"><?= $news->titre()?></td>
				<td style="width: 65%;"><?=$news->contenu() ?></td>
				<td><?= $news->dateAjout() ?></td>
				
				<td>
					<form method="post" action="index.php?action=update&chapter=<?= $news->id() ?>">
						<input type="hidden" name="idNews1" value="<?= $news->id() ?>" />
						<i class="fas fa-edit"></i>
						<input type="submit" name="udptNews" value="Modifier" class="btnAdd"/>
					</form>
				</td>
				<td>
					<form method="post" action="index.php?action=listNews">
						<input type="hidden" name="idNews2" value="<?= $news->id() ?>" />
						<i class="fas fa-eraser"></i>
						<input type="submit" name="supprNews" value="Supprimer" class="btnSuppr" />
					
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