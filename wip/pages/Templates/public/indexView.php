<?php
ob_start();

require 'lib/autoload.php';

$db = Database::dbconnect();
$manager = new NewsManager($db);

?>

		<section class="simpleSection">
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
				
				<div class="col-xl-6 col-lg-6 col-md-2 col-sm-2 sampleNews" style="max-width:30%;">
					<h1><a href="index.php?action=news&chapter=<?= $news->id() ?>"><?= $news->titre() ?></a></h1>

					<p>Posted on <?= $news->dateAjout() ?></p>
					<br />
					<p><?= nl2br($content) ?></p>
					<p><a href="index.php?action=news&chapter=<?= $news->id() ?>">Lire plus</a></p>
				</div>

			<?php
			}
			?>
			</div>
		</section>
<?php
$contentView = ob_get_clean();

require 'pages/Templates/common/layout.php';
?>		