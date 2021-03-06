<?php

class Frontend 
{
    public function listIndex()
    {
        
        $db = Database::dbconnect();
        $manager = new NewsManager($db);


        require 'vues/public/indexView.php';
    }

    public function chapter()
    {
        
        $db = Database::dbconnect();
        $manager = new NewsManager($db);
        $managerComm = new CommentManager($db);

        /*  */
        /* Add comment linked to chapter */
        /*  */
            if(isset($_POST['sendCom']))
            {
                if(!empty($_POST['auteur']) && !empty($_POST['contenu']))
                {
                    $addcomment = new Comment(array(
                        'news' => $_GET['chapter'],
                        'auteur' => $_POST['auteur'],
                        'contenu' => $_POST['contenu']

                    ));
                    $managerComm->add($addcomment);

                    $session = new Session();
                    $session->setFlash('Commentaire ajouté avec succès !', 'success');
                    header('Location: '.$_SERVER['HTTP_REFERER']);
                    exit();
                }
                else
                {
                    $error = 'Un ou plusieurs champs sont vides !';
                }
            }


        require 'vues/public/viewpost.php';
    }

    public function allChapter()
    {
            
        $db = Database::dbconnect();
        $manager = new NewsManager($db);

        require 'vues/public/allpost.php';
    }

    public function error()
    {
        require 'vues/error/404.php';
    }

    public function author()
    {
        require 'vues/public/author.php';
    }
    
    public function contact()
    {
        require 'vues/public/contact.php';
    }
}