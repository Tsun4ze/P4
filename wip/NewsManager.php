<?php



class NewsManager extends Manager
{
	public function add(News $news)
	{
		$req = $this->_db->prepare('INSERT INTO news (auteur, titre, contenu, dateAjout, dateModif) VALUES(:auteur, :titre, :contenu, NOW(), NOW())');
		$req->execute(array(
			'auteur' => $news->auteur(),
			'titre' => $news->titre(),
			'contenu' => $news->contenu()

		));
	}

	public function update(News $news)
	{
		$req = $this->_db->prepare('UPDATE news SET titre = :titre, contenu = :contenu, dateModif = NOW() WHERE id = :id');
		$req->execute(array(
			
			'titre' => $news->titre(),
			'contenu' => $news->contenu(),
			'id' => $news->id()

		));
	}
}