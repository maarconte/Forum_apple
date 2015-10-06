 <?php

class Forum
{
    
    var $pdo;
    
    
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    function selectAvatar($id){
    	return $this->pdo->query('SELECT*FROM users WHERE id="'.$id.'" ')->fetchAll();
    }

    function selectUsers()
    {
        return $this->pdo->query('SELECT * FROM users ;')->fetchAll();
     
    }

    function selectTopics()
    {
    	return $this->pdo->query('SELECT * FROM topics ORDER BY creation DESC;')->fetchAll();
	
    }

    function selectCategoriesTopics($listeTopics)
    {
    	return $this->pdo->query('SELECT*FROM categories WHERE id="'.$listeTopics.'"')->fetchAll();
	
    }

    function selectCategories()
    {
    return $this->pdo->query('SELECT name,categorieId, COUNT(*) as nombre,topics.creation FROM categories, topics WHERE topics.categorieId = categories.id GROUP BY name ORDER BY creation DESC')->fetchAll();	
    }

    function selectCreatorId($listeTopics)
    {
    	return $this->pdo->query('SELECT*FROM users WHERE id="'.$listeTopics.'" ')->fetchAll();
    }

    function creerTopic($id, $title, $description, $categorie)
    {
        $this->pdo->query('INSERT INTO  topics ( title,description,creatorId,creation,categorieId ) VALUES ("' . $title . '", "' . $description . '","' . $id . '",NOW(),"' . $categorie . '");');
    }

    function afficherTopic($id)
    {
    	return $this->pdo->query('SELECT * FROM topics WHERE id="'.$_GET["id"].'"')->fetchAll();
    }

    function afficherTopicUser($id)
    {
    	return $this->pdo->query('SELECT * FROM topics WHERE creatorId="'.$_GET["id"].'"')->fetchAll();
    }

    function selectMessages($topicId)
    {
    	return $this->pdo->query('SELECT * FROM messages  WHERE topicId="'.$topicId.'" ; ')->fetchAll();
    }

     function selectMessagesUser($id)
    {
    	return $this->pdo->query('SELECT * FROM messages  WHERE creatorId="'.$id.'" ; ')->fetchAll();
    }

    function selectMessageCreator($id)
    {
    	return $this->pdo->query('SELECT * FROM users WHERE id="' .$id. '"')->fetchAll();
    }

    function creerMessage($sessionId,$id,$message)
    {
    	 $this->pdo->query('INSERT INTO messages(creation,creatorId,topicId,message) VALUES(NOW(), "'.$sessionId.'","'.$id.'", "'.$message.'")');
    }





    
    
}

?> 