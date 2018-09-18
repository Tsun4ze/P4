<?php
require 'lib/autoload.php';

$db = Database::dbconnect();
$manager = new NewsManager($db);


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
	}
	else
	{
		header('Location: ./404.php');
		exit();
	}

include('viewcomment.php');
include('insertcomment.php');
require('footer.php');
?>