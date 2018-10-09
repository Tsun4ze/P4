<?php
ob_start();


	if(isset($_GET['chapter']))
	{

/*  */		
/* Retrieve chapter */
/*  */
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
/*  */
/* Retrieve comment linked to chapter if exist */
/*  */
			if($managerComm->getComments((int) $_GET['chapter']) != null)
			{
				if(isset($_POST['report']))
				{
					$managerComm->report($_POST['idComment']);
				}
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
								<form action="index.php?chapter=<?= $_GET['chapter'] ?>" method="post">
									<input type="hidden" name="idComment" value="<?=  $comment->id() ?>" />
									<input type="submit" name="report" value="Signaler" />
								</form>
							</div>
						</section>
						<?php
					
				}
			}
			?>
			<section style="text-align: center;">
				<div>
					<h3>Add a comment:</h3>

					<form method="post" action="viewpost.php?chapter=<?php echo $_GET['chapter']; ?>">
						<p>
							<input type="hidden" name="news" value="<?php echo $_GET['chapter'] ?>" />
							<label for="auteur">Pseudo : </label><br /><input type="text" name="auteur" id="auteur" /><br />
							<label for="contenu">Message : </label><br /><textarea name="contenu" id="contenu" rows="5" cols="50"/></textarea><br/><br />
							<input type="submit" name="sendCom" value="Send" />
						</p>
						
					</form>
				</div>
			</section>

			<?php
	}
	else
	{
		header('Location:index.php?error');
		exit();
	}


$contentView = ob_get_clean();
require 'vues/common/layout.php';
?>