<?php

class Forum {

	var $pdo,$id,$title,$description;

	function __construct($pdo){
		$this->pdo=$pdo;
	}

	function creerTopic($id,$title,$description){

		$this->pdo->query('INSERT INTO  topics ( title,description,creatorId,creation ) VALUES ("'.$title.'", "'.$description.'","'.$id.'",NOW());');
	}

	function selectUsers(){
		$request = $this->pdo->query('SELECT * FROM users;');
		$result = $request->fetchAll();
	
	}


}

?>