<?php

include('includes/db.php');
include('includes/forum.php');

$forum= new Forum($pdo);
$profil=$forum->updateProfil(
	$_POST['pseudo'],
	$_POST['email'],
	$_GET['id']


	);


header('Location: accueil.php');
?>
