<?php



class NewsManager extends Manager
{
	public $_db;

	public function __construct(PDO $db)
	{
		$this->_db = $db;
	}

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

	public function delete($id)
	{
		$req = $this->_db->prepare('DELETE FROM news WHERE id = :id');
		$req->execute(array(
			'id' => $id
		));
	}

	public function getList($debut = -1, $limite = -1)
	{
		

		$sql = 'SELECT id, auteur, titre, contenu, dateAjout FROM news ORDER BY id DESC';

		if($debut != -1 || $limite != -1)
		{
			$sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
		}

		$request = $this->_db->query($sql);
		

		while($news = $request->fetch())
		{
			
			$listeNews[] = new News($news);
		}
		
		$request->closeCursor(); 

		return $listeNews;
	}

	public function getUnique($id)
	{
		$request = $this->_db->prepare('SELECT id, auteur, titre, contenu, dateAjout FROM news WHERE id = :id');
		$request->bindValue(':id', (int) $id, PDO::PARAM_INT);
		$request->execute();
		
		while($chapters = $request->fetch())
		{
			$chapter[] = new News($chapters);
		}
		
		$request->closeCursor();
		return $chapter;
		
	}
}