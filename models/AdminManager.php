<?php

class AdminManager extends Manager
{
    public $_db;
    
    

	public function __construct(PDO $db)
	{
		$this->_db = $db;
    }
    
    public function checkLogin($login, $password)
    {
        

        $req = $this->_db->prepare('SELECT * FROM admin WHERE username = :username');
		$req->execute(array(
			'username' => $login
        ));
        $admin = $req->fetch();
        
            
        
        
        
        if(password_verify($password, $admin['password']))
		{
			$adminInfo = array(
                'loginUser' => $admin['username'],
                'userId' => $admin['id']
            );
            
            
			return $adminInfo;
        }
        else
        {
            $session = new Session();
            $session->setFlash('Indentifiants incorrect', 'danger');

            header('Location:'.$_SERVER['HTTP_REFERER']);
        }
    }

    
		
}