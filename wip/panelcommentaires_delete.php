<?php
require ('config.php');
if(isset($_POST['supprCom']))

{
	
	$req = $db->prepare('DELETE FROM comments WHERE id = :id ');
	$req->execute(array(
		'id' => $_POST['idCom']
	));
	
	$confirmMsg = 'Commentaire supprimé avec succès !';
	

	header('Location: '.$_SERVER['HTTP_REFERER']);
	exit();
}