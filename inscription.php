<?php

include('includes/db.php');
include('includes/forum.php');

if ( $_POST['passwordA'] !== $_POST['passwordB'] ) {
	header('Location: error-password.html');
	die();
}

$forum=new Forum($pdo);
$verifyEmail=$forum->verifyEmail(
	$_POST['email']
	);

if ( count($verifyEmail) > 0 ) {
	header('Location: error-email.html');
	die();
} else {

$inscription=$forum->inscription(
	$_POST['pseudo'],
	$_POST['email'],
	$_POST['passwordA'],
	$_POST['avatar']

	);
}
header('Location: connection.php');