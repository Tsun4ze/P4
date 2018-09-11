<?php 

require('config.php');
require('header.php');


if(!isset($_SESSION['id']))
{
	header('Location: index.php');
	exit();
}



$dataCom = $db->prepare('SELECT id, auteur, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %hH%imin%ss\') AS dateAjoutR FROM news ORDER BY id DESC');
$dataCom->execute();


?>


<section>
	<?php
	if(isset($confirmMsg))
	{
		echo '<p style="color: green;">'.$confirmMsg.'</p>';
	}
	?>
	<h2>Liste de total des news :</h2>

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
				while($rowCom = $dataCom->fetch())
				{
					?>
			<tr style="text-align: center;">
				<td style="text-decoration: underline; width: 20%;"><?= $rowCom['titre']?></td>
				<td style="width: 65%;"><?= $rowCom['contenu'] ?></td>
				<td><?= nl2br(htmlspecialchars($rowCom['dateAjoutR'])) ?></td>
				
				<td>
					<form method="post" action="updatenews.php?chapter=<?= $rowCom['id'] ?>">
						<input type="hidden" name="idNews1" value="<?= $rowCom['id'] ?>" />
						
						<input type="submit" name="udptNews" value="Modifier" />
					</form>
				</td>
				<td>
					<form method="post" action="newsaction.php">
						<input type="hidden" name="idNews2" value="<?= $rowCom['id'] ?>" />
						<input type="submit" name="supprNews" value="Supprimer" />
					
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
require('footer.php');
?>