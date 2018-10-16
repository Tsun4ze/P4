<?php

class Comment
{
    protected $_id;
    protected $_news;
    protected $_auteur;
    protected $_contenu;
    protected $_date_comm;
    protected $_report;

    public function __construct($data = [])
    {
        if(!empty($data))
        {
            $this->hydrate($data);
        }
    }

    public function hydrate($data = [])
    {
        if(isset($data['id']))
        {
            $this->setId($data['id']);
        }

        if(isset($data['news']))
        {
            $this->setNews($data['news']);
        }

        if(isset($data['auteur']))
        {
            $this->setAuteur($data['auteur']);
        }

        if(isset($data['contenu']))
        {
            $this->setContenu($data['contenu']);
        }

        if(isset($data['date_comm']))
        {
            $this->setDateComm($data['date_comm']);
        }

        if(isset($data['report']))
        {
            $this->setReport($data['report']);
        }
    }

    /* SETTERS */
    public function setId($id)
    {
        $id = (int) $id;
        if(is_int($id))
        {
            $this->_id = $id;
        }
    }

    public function setNews($news)
    {
        $news = (int) $news;
        if(is_int($news))
        {
            $this->_news = $news;
        }
    }

    public function setAuteur($auteur)
    {
        if(is_string($auteur))
        {
            $this->_auteur = $auteur;
        }
    }

    public function setContenu($contenu)
    {
        if(is_string($contenu))
        {
            $this->_contenu = $contenu;
        }
    }

    public function setDateComm($date_comm)
    {
        $this->_date_comm = $date_comm;
    }

    public function setReport($report)
    {
        $report = (int) $report;
        if(is_int($report))
        {
            $this->_report = $report;
        }
    }


    /* GETTERS */

    public function id()
    {
        return $this->_id;
    }

    public function news()
    {
        return $this->_news;
    }

    public function auteur()
    {
        return $this->_auteur;
    }

    public function contenu()
    {
        return $this->_contenu;
    }

    public function date_comm()
    {
        return $this->_date_comm;
    }

    public function report()
    {
        return $this->_report;
    }
}