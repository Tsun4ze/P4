<?php

require('config.php');

$data = $db->prepare('INSERT INTO admin (id, username, password, email) VALUES (:id, :username, :password, :email)');
$data->execute(array(
	'id' => '147',
	'username' => 'admin',
	'password' => password_hash('test', PASSWORD_DEFAULT),
	'email' => 'admin@admin.com'

)); 

echo 'Done !';
?>