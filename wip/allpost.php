<?php

require('config.php');
require('header.php');

?>

	<section>

		<?php
			$listeAllNews = $db->query('SELECT id, auteur, titre, contenu, DATE_FORMAT(dateAjout, \'%d/%m/%Y à %hH%imin%ss\') AS dateAjoutR FROM news ORDER BY id ASC');
			while($rowNews = $listeAllNews->fetch())
			{
				?>
						<div style="text-align: center;width: 70%; margin: auto;" class="listNews">
							<h1><a href="viewpost.php?chapter=<?= $rowNews['id'] ?>"><?= $rowNews['titre'] ?></a></h1>

							<p>Posted on <?= $rowNews['dateAjoutR'] ?></p>
							<br />
							<p><?= substr($rowNews['contenu'], 0,100) ?> ...</p>
							<p><a href="viewpost.php?id=<?= $rowNews['id'] ?>">Lire plus</a></p>
						</div>
				<?php
			}
			$listeAllNews->closeCursor();
		?>

	</section>

<?php
require('footer.php');
?>