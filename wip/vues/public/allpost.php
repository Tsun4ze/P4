<?php
ob_start();

?>

	<section class="simpleSection">

		<?php
			
			

			foreach($manager->getList() as $news)
			{
				/*  */
				/* Manage content */
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
						<div style="text-align: center;width: 70%; margin: auto;" class="listNews">
							<h1><a href="viewpost.php?chapter=<?= $news->id() ?>"><?= $news->titre() ?></a></h1>

							<p>Posted on <?= $news->dateAjout() ?></p>
							<br />
							<p><?= $content ?></p>
							<p><a href="viewpost.php?id=<?= $news->id() ?>">Lire plus</a></p>
						</div>
				<?php
			}
			
		?>

	</section>

<?php
$contentView = ob_get_clean();
require 'vues/common/layout.php';
?>