<?php
if(session_status() == PHP_SESSION_NONE) :
	session_start();
endif;

require 'controllers/Frontend.php';
require 'controllers/Backend.php';
require 'models/autoload.php';

$frontend = new Frontend();
$backend = new Backend();


try
{
	/*  */
	/* All users, news seletions */
	/*  */
	if(isset($_GET['action']) && !empty($_GET['action']))
	{
		if($_GET['action'] === 'news')
		{
			if(isset($_GET['chapter']) && ((int) $_GET['chapter'] > 0))
			{
				
				// Check if chapter exist in DB
				$db = Database::dbconnect();
				$idChapter = (int) $_GET['chapter'];
				$req = $db->prepare("SELECT * FROM news WHERE id = :id");
				$req->execute(array(
					'id' => $idChapter
				));
				$row = $req->fetch();
					
				if($row['id'])
				{
					$frontend->chapter();
				}
				else
				{
					$frontend->error();
				}
				
				$req->closeCursor();
			}
			else
			{
				$frontend->error();
			}

			
		}
		elseif($_GET['action'] === 'allnews')
		{
			$frontend->allChapter();
		
		}
		elseif($_GET['action'] === 'author')
		{
			$frontend->author();
		}
		elseif($_GET['action'] === 'contact')
		{
			$frontend->contact();
		}
		/*  */
		/* Admin part */
		/*  */
		elseif($_GET['action'] === 'signup')
		{
			if(isset($_SESSION['Adm']) && $_SESSION['Adm'] === 'admin')
			{
				$backend->adminHome();
			}
			else
			{
				$backend->login();
			}

		}
		elseif($_GET['action'] === 'gestComs')
		{
			if(isset($_SESSION['Adm']) && $_SESSION['Adm'] === 'admin')
			{
				$backend->gestComs();
			}
			else
			{
				$backend->login();
			}
			
		}
		elseif($_GET['action'] === 'addNews')
		{
			if(isset($_SESSION['Adm']) && $_SESSION['Adm'] === 'admin')
			{
				$backend->addNews();
			}
			else
			{
				$backend->login();
			}
			
		}
		elseif($_GET['action'] === 'listNews')
		{
			if(isset($_SESSION['Adm']) && $_SESSION['Adm'] === 'admin')
			{
				$backend->admList();
			}
			else
			{
				$backend->login();
			}
			
		}
		elseif($_GET['action'] === 'update' && ((int) $_GET['chapter'] > 0))
		{
			if(isset($_SESSION['Adm']) && $_SESSION['Adm'] === 'admin')
			{

				// Check if chapter exist in DB
				$db = Database::dbconnect();
				$idChapter = (int) $_GET['chapter'];
				$req = $db->prepare("SELECT * FROM news WHERE id = :id");
				$req->execute(array(
					'id' => $idChapter
				));
				$row = $req->fetch();
					
				if($row['id'])
				{
					$backend->update();
				}
				else
				{
					$frontend->error();
				}


				
			}
			else
			{
				$backend->login();
			}
			
		}
		elseif($_GET['action'] === 'comSignal')
		{
			if(isset($_SESSION['Adm']) && $_SESSION['Adm'] === 'admin')
			{
				$backend->comSignal();
			}
			else
			{
				$backend->login();
			}
			
		}
		elseif($_GET['action'] === 'dc')
		{
			session_destroy();

			header('Location: ./');
			exit();
		}
		else
		{
			$frontend->listIndex();
		}
		
	}
	else
	{
		
		$frontend->listIndex();
	}
}
catch(Exception $e) 
{
    echo 'Erreur : ' . $e->getMessage();
}
	
	