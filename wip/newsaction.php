<?php
require ('config.php');

// DELETE POSTS
if(isset($_POST['supprNews']))
{
	
	$req = $db->prepare('DELETE FROM news WHERE id = :id ');
	$req->execute(array(
		'id' => $_POST['idNews2']
	));
	
	$confirmMsg = 'News supprimé avec succès !';
	

	header('Location: '.$_SERVER['HTTP_REFERER']);
	exit();
}

