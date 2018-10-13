<?php
ob_start();

?>

		<section >
			<div class="titreHeader jumbotron jumbotron-fluid">
				<h1>Un billet simple pour l'Alaska</h1>
			</div>
			<div class="row newsTiles">
<?php

	foreach ($manager->getList(0, 6) as $news)
	{

	/*  */
	/* Manage content */
	/*  */
	if (strlen($news->contenu()) <= 150)
	{
		$content = $news->contenu();
	}
	else
	{
		$start = substr($news->contenu(), 0, 150);
		$start = substr($start, 0, strrpos($start, ' ')) . ' ...';

		$content = $start;
	}



?>
				
				<div class="card sampleNews">
					<div class="card-body">
						<h2><a href="index.php?action=news&chapter=<?= $news->id() ?>"><?= $news->titre() ?></a></h2>

						<p>Posted on <?= $news->dateAjout() ?></p>
						<br />
						<p><?= nl2br($content) ?></p>
						<p><a href="index.php?action=news&chapter=<?= $news->id() ?>" class="btn btn-primary">Lire plus</a></p>
					</div>
				</div>

			<?php
			}
			?>
			</div>
		</section>
<?php
$contentView = ob_get_clean();

require 'vues/common/layout.php';
?>		