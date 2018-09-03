<?php
require('config.php');
require('header.php');
?>

		<section>
			<?php

			try
			{
				$listeDataB = $db->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %hH%imin%ss\') AS dateAjoutR FROM news ORDER BY id DESC LIMIT 0, 5');
				while($rowLDB = $listeDataB->fetch())
				{
					echo '
					<div style="text-align: center;width: 70%; margin: auto;">
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
		</section>
<?php
require('footer.php');
?>		