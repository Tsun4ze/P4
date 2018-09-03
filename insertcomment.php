<?php 
$error;

if(isset($_POST['sendCom']))
{
	if(empty($_POST['auteur']) || empty($_POST['contenu']))
	{

		$error = 'Complete the full form, please.';
		return;
	}

	
	
	$dataCom = $db->prepare('INSERT INTO comments (news, auteur, contenu, date_comm) VALUES (:news, :auteur, :contenu, NOW())');
	$dataCom->execute(array(

		'news' => $_POST['news'],
		'auteur' => $_POST['auteur'],
		'contenu' => $_POST['contenu'],

	));


	header('Location: '.$SERVER['HTTP_REFERER']);
	exit;
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