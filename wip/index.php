<?php

require 'controller/frontend.php';
require 'controller/backend.php';

if(session_status() == PHP_SESSION_NONE) :
	session_start();
endif; 

try
{
	/*  */
	/* All users, news seletions */
	/*  */
	if(isset($_GET['action']) && !empty($_GET['action']))
	{
		if($_GET['action'] === 'news' && ((int) $_GET['chapter']) > 0)
		{
			getChapter();
		}
		elseif($_GET['action'] === 'allnews')
		{
			getAllChapter();
		
		}
		/*  */
		/* Admin part */
		/*  */
		elseif($_GET['action'] === 'signup')
		{
			if(isset($_SESSION['Adm']) && $_SESSION['Adm'] === 'admin')
			{
				getAdminHome();
			}
			else
			{
				getLogin();
			}

		}
		elseif($_GET['action'] === 'gestComs')
		{
			getGestComs();
		}
		elseif($_GET['action'] === 'addNews')
		{
			getAddNews();
		}
		elseif($_GET['action'] === 'listNews')
		{
			getAdmList();
		}
		elseif($_GET['action'] === 'update' && ((int) $_GET['chapter'] > 0))
		{
			getUpdate();
		}
		elseif($_GET['action'] === 'dc')
		{
			session_destroy();

			header('Location: ./');
			exit();
		}
		
	}
	
	else
	{
		listIndex();
	}
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}
	
	