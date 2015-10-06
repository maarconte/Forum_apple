 <?php

class Forum
{
    
    var $pdo;
    

// PDO

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


// Inscription 

    function verifyEmail($email){
    	 return $this->pdo->query('SELECT * FROM users WHERE email="'.$email.'";')->fetchAll();
    }

    function inscription($pseudo,$email,$password,$avatar)
    {
    	$this->pdo->query('INSERT INTO users ( pseudo, email, password, avatar ) 
    		VALUES ("'.$pseudo.'","'.$email.'","'.$password.'", "'.$avatar.'");');
    }

//Connexion

    function connexion($email,$password){
    	return$this->pdo->query('SELECT * FROM users WHERE email="'.$email.'" AND password = "'.$password.'";')->fetchAll();

    }


// Afficher Avatar
    
    function selectAvatar($id){
    	return $this->pdo->query('SELECT*FROM users WHERE id="'.$id.'" ')->fetchAll();
    }

// Liste Users

    function selectUsers()
    {
        return $this->pdo->query('SELECT * FROM users ;')->fetchAll();
     
    }

// Liste Topics

    function selectTopics()
    {
    	return $this->pdo->query('SELECT * FROM topics ORDER BY creation DESC;')->fetchAll();
	
    }
// Afficher les categories des topics

    function selectCategoriesTopics($listeTopics)
    {
    	return $this->pdo->query('SELECT*FROM categories WHERE id="'.$listeTopics.'"')->fetchAll();
	
    }
// Liste des categories

    function selectCategories()
    {
    return $this->pdo->query('SELECT name,categorieId, COUNT(*) as nombre,topics.creation FROM categories, topics WHERE topics.categorieId = categories.id GROUP BY name ORDER BY creation DESC')->fetchAll();	
    }
// Afficher Auteur Topic
    function selectCreatorId($listeTopics)
    {
    	return $this->pdo->query('SELECT*FROM users WHERE id="'.$listeTopics.'" ')->fetchAll();
    }

// Creer Topic

    function creerTopic($id, $title, $description, $categorie)
    {
        $this->pdo->query('INSERT INTO  topics ( title,description,creatorId,creation,categorieId ) VALUES ("' . $title . '", "' . $description . '","' . $id . '",NOW(),"' . $categorie . '");');
    }

 // Page du Topic

    function afficherTopic($id)
    {
    	return $this->pdo->query('SELECT * FROM topics WHERE id="'.$_GET["id"].'"')->fetchAll();
    }

// Tous les Topics du User

    function afficherTopicUser($id)
    {
    	return $this->pdo->query('SELECT * FROM topics WHERE creatorId="'.$_GET["id"].'"')->fetchAll();
    }
// Tous les Messages du Topic

    function selectMessages($topicId)
    {
    	return $this->pdo->query('SELECT * FROM messages  WHERE topicId="'.$topicId.'" ; ')->fetchAll();
    }

//Tous les Messages du User

     function selectMessagesUser($id)
    {
    	return $this->pdo->query('SELECT * FROM messages  WHERE creatorId="'.$id.'" ; ')->fetchAll();
    }


    function selectMessageCreator($id)
    {
    	return $this->pdo->query('SELECT * FROM users WHERE id="' .$id. '"')->fetchAll();
    }

// Creer un Message

    function creerMessage($sessionId,$id,$message)
    {
    	 $this->pdo->query('INSERT INTO messages(creation,creatorId,topicId,message) VALUES(NOW(), "'.$sessionId.'","'.$id.'", "'.$message.'")');
    }

 // Liste Categories dans dropdown

 	function listeCategories()
 	{
 		return $this->pdo->query('SELECT * FROM categories')->fetchAll();

 	}  

 // Search Topics

 	function searchTopics($search){
 		return $this->pdo->query('SELECT * FROM topics WHERE title LIKE "%'.$search.'%" ORDER BY title;')->fetchAll();

 	}

 // Search Users
 	
 	function searchUsers($search){
 		return $this->pdo->query('SELECT * FROM users WHERE pseudo LIKE "%'.$search.'%" ORDER BY pseudo;')->fetchAll();

 	}

// Liste des Topics de la Categorie

 	function listeTopicsCategorie($id){
 		return $this->pdo->query('SELECT * FROM topics  WHERE categorieId = "'.$id.'" ORDER BY creation DESC;')->fetchAll();

 	}


    
    
}

?> 