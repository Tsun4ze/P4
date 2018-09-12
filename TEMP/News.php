<?php

class News
{
	private $_id;
	private $_auteur;
	private $_titre;
	private $_contenu;
	private $_dateAjout;

	public function hydrate(Array $data)
	{
		if(isset($data['id']))
		{
			$this->setId($data['id']);
		}

		if(isset($data['auteur']))
		{
			$this->setAuteur($data['auteur']);
		}

		if(isset($data['titre']))
		{
			$this->setTitre($data['titre']);
		}

		if(isset($data['contenu']))
		{
			$this->setContenu($data['contenu']);
		}

		if(isset($data['dateAjout']))
		{
			$this->setDateAjout($data['dateAjout']);
		}
	}

	/*SETTER*/
	public function setId($id)
	{
		$id = (int) $id;
		if(is_int($id))
		{
			$this->_id = $id;
		}
	}

	public function setAuteur($auteur)
	{
		if(is_string($auteur))
		{
			$this->_auteur = $auteur;
		}
	}

	public function setTitre($titre)
	{
		if(is_string($titre))
		{
			$this->_titre = $titre;
		}
	}

	public function setContenu($contenu)
	{
		if(is_string($contenu))
		{
			$this->_contenu = $contenu;
		}
	}

	public function setDateAjout($dateAjout)
	{
		$this->_dateAjout = $dateAjout;
	}

	/*GETTER*/
	public function id()
	{
		return $this->_id;
	}

	public function auteur()
	{
		return $this->_auteur;
	}

	public function titre()
	{
		return $this->_titre;
	}

	public function contenu()
	{
		return $this->_contenu;
	}

	public function dateAjout()
	{
		return $this->_dateAjout;
	}

}