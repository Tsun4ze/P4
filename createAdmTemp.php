<?php

require 'models/autoload.php';
try
{
    $hashedpass = password_hash('test', PASSWORD_DEFAULT);

    $db = Database::dbconnect();

    $req = $db->prepare('INSERT INTO admin (id, username, password, email) VALUES (:id, :username, :password, :email)');
    $req->execute(array(
        'id' => 147,
        'username' => 'admin',
        'password' => $hashedpass,
        'email' => 'admin@admin.com'
    ));

    echo 'Done :)';
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}
    