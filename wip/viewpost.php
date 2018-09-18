<?php
require 'lib/autoload.php';

$db = Database::dbconnect();
$manager = new NewsManager($db);
$managerComm = new CommentManager($db);

require('header.php');


	if(isset($_GET['chapter']))
	{
		
		foreach($manager->getUnique((int) $_GET['chapter']) as $chapter)
		{

		?>
			
			<section class="singlePost" style="text-align: center;">
			
			
				<div>
					<h2><?= $chapter->titre() ?></h2>
					<p>Posted on <?= $chapter->dateAjout(); ?></p>
					<br />
					<p><?= nl2br($chapter->contenu()); ?></p>
				</div>
		

			</section>
		<?php
		}
		?>
		
		<?php
			if($managerComm->getComments((int) $_GET['chapter']) != null)
			{
				foreach($managerComm->getComments((int) $_GET['chapter']) as $comment)
				{
					
					
						?>
						<section class="commentary">
							<div>
								<h3><?= $comment->auteur() ?></h3>
								<p>Posted on <?= $comment->date_comm() ?></p>
								<br />
								<p><?=  $comment->contenu() ?></p>
							</div>

							<div>
								<form action="signalement.php" method="post">
									<input type="hidden" name="idComment" value="<?=  $comment->id() ?>" />
									<input type="submit" name="report" value="Signaler" />
								</form>
							</div>
						</section>
						<?php
					
				}
			}
	}
	else
	{
		header('Location: ./404.php');
		exit();
	}


include('insertcomment.php');
require('footer.php');
?>