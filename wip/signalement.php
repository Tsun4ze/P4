<?php

require('config.php');




$req = $db->prepare('UPDATE comments SET report = report + 1 WHERE id = :id');
$req->execute(array(
	'id' => $_POST['idComment']
));

header('Location: '.$_SERVER['HTTP_REFERER']);
exit();


