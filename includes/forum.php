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
   
       	$request=$this->pdo->prepare('SELECT * FROM users WHERE email=:email;');
       	$request->execute([
       		':email'=>$email
       		]);
       	return $request->fetchAll(); 
       }
   
       function inscription($pseudo,$email,$password,$avatar)
       {
       	$request=$this->pdo->prepare('INSERT INTO users ( pseudo, email, password, avatar ) 
       		VALUES (:pseudo, :email, :password, :avatar);');
       	$request->execute([
       		':pseudo'=> $pseudo,
       		':email'=> $email,
       		':password'=> $password,
       		':avatar'=>$avatar
       		]);
   
       	
       }
   
   
   //Connexion
   
       function connexion($email,$password){
   
       	$request=$this->pdo->prepare('SELECT * FROM users WHERE email=:email AND password = :password;');
       	$request->execute([
       		':email'=> $email,
       		':password'=> $password
       		]);
   
       	return $request->fetchAll();
   
   
       }
   
   
   // Afficher Avatar
       
       function selectUser($id){
       	    	$request=$this->pdo->prepare('SELECT*FROM users WHERE id= :id');
       	$request->execute([
       		':id'=> $id
       		]);
   
       	return $request->fetchAll();
       }
   
   // Liste Users
   
       function selectUsers()
       {
       	 $request=$this->pdo->prepare('SELECT * FROM users ;');
       	 $request->execute([]);
       	return $request->fetchAll();
    
        
       }
   
   // Liste Topics
   
       function selectTopics()
       {
       	$request=$this->pdo->prepare('SELECT * FROM topics ORDER BY creation DESC;');
       	$request->execute([]);
       	return $request->fetchAll();
       	
   	
       }
   // Afficher les categories des topics
   
       function selectCategoriesTopics($listeTopics)
       {
   
       	$request=$this->pdo->prepare('SELECT*FROM categories WHERE id= :listeTopics');
       	$request->execute([
       		':listeTopics'=> $listeTopics
       		]);
   
       	return $request->fetchAll();    	
   
   	
       }
   // Liste des categories
   
       function selectCategories()
       {
       	$request=$this->pdo->prepare('SELECT name,categorieId, COUNT(*) as nombre,topics.creation FROM categories, topics WHERE topics.categorieId = categories.id GROUP BY name ORDER BY creation DESC');
       	$request->execute([]);
       	return $request->fetchAll();
       
       }
   // Afficher Auteur Topic
       function selectCreatorId($listeTopics)
       {
       	$request=$this->pdo->prepare('SELECT*FROM users WHERE id= :listeTopics');
       	$request->execute([
       		':listeTopics'=> $listeTopics
       		]);
       	return $request->fetchAll();
       }
   
   // Creer Topic
   
       function creerTopic( $title, $description,$id,$categorie)
       {
       	$request=$this->pdo->prepare('INSERT INTO  topics ( title,description,creatorId,creation,categorieId ) VALUES (:title, :description,:id,NOW(),:categorie);');
       	$request->execute([
       		':title'=> $title,
       		':description'=> $description,
       		':id'=> $id,
       		':categorie'=>$categorie
       		]);
       	return $request->fetchAll();
       }
   
    // Page du Topic
   
       function afficherTopic($id)
       {
       	$request=$this->pdo->prepare('SELECT * FROM topics WHERE id= :id ');
       	$request->execute([
       		':id'=> $id,
       		]);
   
       	return $request->fetchAll();
       	
       }
   
   // Tous les Topics du User
   
       function afficherTopicUser($id)
       {
       	    	$request=$this->pdo->prepare('SELECT * FROM topics WHERE creatorId= :id');
       	$request->execute([
       		':id'=> $id
       		]);
   
       	return $request->fetchAll();
       }
   // Tous les Messages du Topic
   
       function selectMessages($topicId)
       {
       	$request=$this->pdo->prepare('SELECT * FROM messages  WHERE topicId= :topicId');
       	$request->execute([
       		':topicId'=> $topicId
       		]);
       	return $request->fetchAll();
       }
   
   //Tous les Messages du User
   
        function selectMessagesUser($id)
       {
       	    	$request=$this->pdo->prepare('SELECT * FROM messages  WHERE creatorId= :id');
       	$request->execute([
       		':id'=> $id
       		]);
   
       	return $request->fetchAll();
       	
       }
   
   
       function selectMessageCreator($id)
       {
       	    	$request=$this->pdo->prepare('SELECT * FROM users WHERE id= :id');
       	$request->execute([
       		':id'=> $id
       		]);
   
       	return $request->fetchAll();
       }
   
   // Creer un Message
   
       function creerMessage($sessionId,$id,$message)
       {
       	$request=$this->pdo->prepare('INSERT INTO messages(creation,creatorId,topicId,message) VALUES(NOW(), :sessionId ,:id , :message )');
       	$request->execute([
       		':sessionId'=> $sessionId,
       		':id'=> $id,
       		':message'=> $message
       		]);
   
       	return $request->fetchAll();
       	 }
   
    // Liste Categories dans dropdown
   
    	function listeCategories()
    	{
    		$request=$this->pdo->prepare('SELECT * FROM categories');
    		$request->execute([]);
       	return $request->fetchAll();
   
   
    	}  
   
    // Search Topics
   
    	function searchTopics($search){
    		$request=$this->pdo->prepare('SELECT * FROM topics WHERE title LIKE :search ORDER BY title;');
       	$request->execute([
       		':search'=> '%' . $search . '%'
       		]);
   
       	return $request->fetchAll();
    		}
   
    // Search Users
    	
    	function searchUsers($search){
    	
   	$request=$this->pdo->prepare('SELECT * FROM users WHERE pseudo LIKE :search ORDER BY pseudo;');
   		$request->execute([
       		':search'=> '%' . $search . '%'
       		]);
   
       	return $request->fetchAll();
    	}
   
    // Afficher Categorie
   
    	function afficherCategorie($id){
       	$request=$this->pdo->prepare('SELECT * FROM categories  WHERE id = :id ;');
       	$request->execute([
       		':id'=> $id
       		]);
   
       	return $request->fetchAll();
   
   
    	}
   
   
   // Liste des Topics de la Categorie
   
    	function listeTopicsCategorie($id){
    		    	$request=$this->pdo->prepare('SELECT * FROM topics  WHERE categorieId = :id ORDER BY creation DESC;');
       	$request->execute([
       		':id'=> $id
       		]);
   
       	return $request->fetchAll();
    		
   
    	}
   
   // Delete Topic
   
    	function deleteTopic($id)
    	{
    		    	$request=$this->pdo->prepare('DELETE FROM topics WHERE id= :id ');
       	$request->execute([
       		':id'=> $id
       		]);
   
   
    	}
   
   // Update Topic
   
    	function updateTopic($title, $description,$id)
    	{
    		    	$request=$this->pdo->prepare('UPDATE topics SET  title= :title, description= :description WHERE  id= :id ');
       	$request->execute([
       		':title'=> $title,
       		':description'=> $description,
       		':id'=> $id
       		]);
    	}
   
   // Update Profil  
   
   	function updateProfil($pseudo,$email,$id)
   	{
   		    	$request=$this->pdo->prepare('UPDATE users SET  pseudo= :pseudo, email= :email WHERE  id= :id');
       	$request->execute([
       		':pseudo'=> $pseudo,
       		':email'=> $email,
       		':id'=> $id
       		]);
   
   	} 
   
   // Update Avatar
   
   	function updateAvatar($avatar,$id)
   	{
   		    	$request=$this->pdo->prepare('UPDATE users SET  avatar= :avatar WHERE  id= :id');
       	$request->execute([
   			':avatar'=>$avatar,
       		':id'=>$id
       		]);
   		$this->pdo->query('');
   
   	}
   
   // Afficher Topic dans le lequel l'utilisateur a laissé un message
   
   	function topicActiv($id){
   		$request=$this->pdo->prepare('SELECT * FROM topics WHERE id= :id ');
       	$request->execute([
       		':id'=> $id
       		]);
   
       	return $request->fetchAll();
   			}
       
   }
   
   
   
   
   
   
   ?>