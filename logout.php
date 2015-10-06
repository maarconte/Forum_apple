<?php

session_destroy();

include('includes/db.php');
include('includes/forum.php');

$forum=new Forum($pdo);
$connexion=$forum->connexion(
	$_POST['email'],
	$_POST['password']

	);
if ( count($connexion) > 0 ) {
	
	$_SESSION['user'] = $connexion[0];
	header('Location: admin.php');

} else {

	header('Location: connection.html');

}
