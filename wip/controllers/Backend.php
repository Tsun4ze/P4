<?php

class Backend 
{
    public function login() /* rename Login also others */
    {
        
        $db = Database::dbconnect();
        $adminManager = new AdminManager($db);


        if(isset($_POST['admLog']))
        {
            
            if((isset($_POST['userLog'])) && (isset($_POST['passLog'])) && (!empty($_POST['userLog'])) && (!empty($_POST['passLog'])))
            {
                $adminManager->checkLogin($_POST['userLog'], $_POST['passLog']);
                $_SESSION['Adm'] = $_POST['userLog'];
                header('Location: index.php?action=signup');
                exit();
            }
            else
            {
                $errorLog = 'Error: one or more fields are empty.';
            }
        }

        require 'vues/admin/login.php';
    }

    public function adminHome()
    {
        require 'vues/admin/admin.php';
    }

    public function gestComs()
    {
        $db = Database::dbconnect();
        $manager = new CommentManager($db);

        /*  */
        /* Delete comment */
        /*  */
        if(isset($_POST['supprCom']))
        {
            $manager->delete((int) $_POST['idCom']);
        }


        require 'vues/admin/panelcommentaires.php';
    }

    public function addNews()
    {
        
        $db = Database::dbconnect();
        if(isset($_POST['addNews']))
        {
            if(!empty($_POST['title'])){

                if(!empty($_POST['contentNews']))
                {
                    
                    $newsManager = new NewsManager($db);
                    $news = new News(array(
                        'auteur' => $_SESSION['pseudo'],
                        'titre' => $_POST['title'],
                        'contenu' => $_POST['contentNews']
                    ));
                    $newsManager->add($news);

                    header('Location: listenews.php');
                    exit();
                }else{
                    $errorAddNews = 'L\'article est vide';
                }
                
            }else{
                $errorAddNews = 'Le titre est manquant';
            } 
        }

        require 'vues/admin/addnews.php';
    }

    public function admList()
    {
            
        $db = Database::dbconnect();
        $manager = new NewsManager($db);

        /*  */
        /* Delete selected News/Chapter */
        /*  */
        if(isset($_POST['supprNews']))
        {
            $manager->delete((int) $_POST['idNews2']);
        }

        require 'vues/admin/listenews.php';
    }

    public function update()
    {
        
        $db = Database::dbconnect();
        $manager = new NewsManager($db);

        //Modfication
        if(isset($_POST['addNews']))
        {
            if(!empty($_POST['title'])){

                if(!empty($_POST['contentNews']))
                {
                    $newsManager = new NewsManager($db);
                    $news = new News(array(
                        
                        'titre' => $_POST['title'],
                        'contenu' => $_POST['contentNews'],
                        'id' => $_POST['idNewsUp']

                    ));
                    $newsManager->update($news);

                }
                $errorAddNews = 'L\'article est vide';

            }

            $errorAddNews = 'Le titre est manquant';
        }


        require 'vues/admin/updatenews.php';
    }

    public function comSignal()
    {
        
        $db = Database::dbconnect();
        $manager = new CommentManager($db);


        /*  */
        /* Delete reported comment */
        /*  */
        if(isset($_POST['supprCom']))
        {
            $manager->delete((int) $_POST['idCom']);
        }


        require 'vues/admin/report.php';
    }
}