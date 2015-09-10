<?php

session_start();

$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);

$request = $pdo->query(
	'SELECT * FROM users WHERE email="' . $_POST['email'] . '" AND password = "' . $_POST['password']. '";'
);

$result = $request->fetchAll();

if ( count($result) > 0 ) {
	
	$_SESSION['users'] = $result[0];
	header('Location: accueil.php');

} else {

	header('Location: connection.html');

}
