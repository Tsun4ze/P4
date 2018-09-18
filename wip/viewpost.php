<?php
require 'lib/autoload.php';

$db = Database::dbconnect();
$manager = new NewsManager($db);
$managerComm = new CommentManager($db);

require('header.php');


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
/*  */
/* Add comment linked to chapter */
/*  */
			if(isset($_POST['sendCom']))
			{
				if(!empty($_POST['auteur']) && !empty($_POST['contenu']))
				{
					$addcomment = new Comment(array(
						'news' => $_GET['chapter'],
						'auteur' => $_POST['auteur'],
						'contenu' => $_POST['contenu']

					));
					$managerComm->add($addcomment);

					header('Location: '.$_SERVER['HTTP_REFERER']);
					exit();
				}
				else
				{
					$error = 'Un ou plusieurs champs sont vides !';
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
							<label for="contenu">Message : </label><br /><textarea name="contenu" id="contenu" rows="10" cols="40"/></textarea><br/><br />
							<input type="submit" name="sendCom" value="Send" />
						</p>
						
					</form>
					<?php
					if(isset($error))
					{
						echo '<p style="color: red;">'.$error.'</p>';
					} 
					
					?>
				</div>
			</section>

			<?php
	}
	else
	{
		header('Location: 404.php');
		exit();
	}



require('footer.php');
?>