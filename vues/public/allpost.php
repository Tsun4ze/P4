<?php
ob_start();

?>

	<section class="row newsAllTiles">

<?php
	foreach($manager->getList() as $news)
	{
		/*  */
		/* Manage content */
		/* Text length */
		/*  */
		if (strlen($news->contenu()) <= 100)
		{
			$content = $news->contenu();
		}
		else
		{
			$start = substr($news->contenu(), 0, 100);
			$start = substr($start, 0, strrpos($start, ' ')) . ' ...';

			$content = $start;
		}
?>

					<div class="card simpleSection">
						<div class="card-body listAll">
							<h2><a href="index.php?action=news&chapter=<?= $news->id() ?>"><?= $news->titre() ?></a></h2>

							<p>Posté le <?= $news->dateAjout() ?></p>
							<br />
							<p><?= $content ?></p>
							<p><a href="index.php?action=news&chapter=<?= $news->id() ?>" class="btn btn-primary">Lire plus</a></p>
						</div>
					</div>
				<?php
			}
			
		?>

	</section>

<?php
$contentView = ob_get_clean();
require 'vues/common/layout.php';
?>