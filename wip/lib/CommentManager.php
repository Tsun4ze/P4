<?php

class CommentManager extends Manager
{
    public $_db;

	public function __construct(PDO $db)
	{
		$this->_db = $db;
    }
    
    public function add(Comment $comment)
    {
        $req = $this->_db->prepare('INSERT INTO comments (news, auteur, contenu, date_comm) VALUES (:news, :auteur, :contenu, NOW())');
        $req->execute(array(
            'news' => $comment->news(),
            'auteur' => $comment->auteur(),
            'contenu' => $comment->contenu()
        ));
    }

    public function delete($id)
    {
        $req = $this->_db->prepare('DELETE FROM comments WHERE id = :id');
        $req->execute(array(
            'id' => $id
        ));
    }

    public function getList()
    {
        $sql = 'SELECT id, auteur, contenu, date_comm FROM comments ORDER BY id DESC';

        $request = $this->_db->query($sql);

        while($comment = $request->fetch())
        {
            $listeComm = new Comment($comment);
        }

        $request->closeCursor();

        return $listeComm;
    }

    public function getComments($newsId)
    {
        $sql = 'SELECT id, news, auteur, contenu, date_comm FROM comments WHERE news = :news ORDER BY date_comm ASC';
        $req = $this->_db->prepare($sql);
        $req->bindValue(':news', (int) $newsId, PDO::PARAM_INT);
        $req->execute();

        while($comment = $req->fetch())
        {
           
            $commentar[] = new Comment($comment);
        }

        $req->closeCursor();
        if(!empty($commentar))
        {
            return $commentar;
        }
       
    }
}