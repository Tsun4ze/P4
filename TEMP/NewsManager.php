<?php



class NewsManager extends Manager
{
	public function add(News $news)
	{
		$req = $db->prepare('INSERT INTO news (auteur, titre, contenu, dateAjout, dateModif) VALUES(:auteur, :titre, :contenu, NOW(), NOW())');
		$req->execute(array(
			'auteur' => $news->auteur(),
			'titre' => $news->titre(),
			'contenu' => $news->contenu()

		));
	}
}