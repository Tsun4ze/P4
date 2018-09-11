<?php

if(($hashed_pass === $rowAdm['password']) && ($_POST['userLog'] === $rowAdm['username'] ))
		{
			$_SESSION['id'] = $rowAdm['id'];
			$_SESSION['Pseudo'] = $rowAdm['username'];
			$_SESSION['Email'] = $rowAdm['email'];

			header('Location : admin.php');
			exit();
		}
		else
		{
			$errorLog = 'Wrong email or password';
		}