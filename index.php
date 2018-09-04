<?php
require('config.php');
require('header.php');
?>

		<section>
			<div class="titreHeader">
				<h1>Un billet simple pour l'Alaska</h1>
			</div>
			<div class="row">
			<?php

			try
			{
				$listeDataB = $db->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %hH%imin%ss\') AS dateAjoutR FROM news ORDER BY id DESC LIMIT 0, 6');
				while($rowLDB = $listeDataB->fetch())
				{
					echo '
					
					<div class="col-xl-6 col-lg-6 col-md-2 col-sm-2 sampleNews" style="max-width:30%;">
						<h1><a href="viewpost.php?chapter='.$rowLDB['id'].'">' .$rowLDB['titre'].'</a></h1>

						<p>Posted on '.$rowLDB['dateAjoutR'].'</p>
						<br />
						<p>'.$rowLDB['contenu'].' </p>
						<p><a href="viewpost.php?chapter='.$rowLDB['id'].'">Lire plus</a></p>
					</div>';
					
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