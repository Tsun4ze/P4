<?php
require('config.php');
require('header.php');
?>

		<section>
			<div class="titreHeader jumbotron jumbotron-fluid">
				<h1>Un billet simple pour l'Alaska</h1>
			</div>
			<div class="row newsTiles">
			<?php

			try
			{
				$listeDataB = $db->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %hH%imin%ss\') AS dateAjoutR FROM news ORDER BY id DESC LIMIT 0, 6');
				while($rowLDB = $listeDataB->fetch())
				{
					?>
					
					<div class="col-xl-6 col-lg-6 col-md-2 col-sm-2 sampleNews" style="max-width:30%;">
						<h1><a href="viewpost.php?chapter=<?= $rowLDB['id']; ?>"><?= $rowLDB['titre']; ?></a></h1>

						<p>Posted on <?=$rowLDB['dateAjoutR']; ?></p>
						<br />
						<p><?= substr($rowLDB['contenu'], 0, 150); ?> ...</p>
						<p><a href="viewpost.php?chapter=<?=$rowLDB['id']; ?>">Lire plus</a></p>
					</div>

					<?php
				}
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			$listeDataB->closeCursor();
			?>
			</div>
		</section>
<?php
require('footer.php');

?>		