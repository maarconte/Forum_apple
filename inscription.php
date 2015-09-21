<?php

include('includes/db.php');

if ( $_POST['passwordA'] !== $_POST['passwordB'] ) {
	header('Location: error-password.html');
	die();
}

$request = $pdo->query(
	'SELECT * FROM users WHERE email="' . $_POST['email'] . '";'
);
$result = $request->fetchAll();

if ( count($result) > 0 ) {
	header('Location: error-email.html');
	die();
} else {
	$requestB = $pdo->query('INSERT INTO users ( pseudo, email, password, avatar ) VALUES ("' . $_POST['pseudo'] . '","' . $_POST['email'] . '", "' . $_POST['passwordA'] . '", "' . $_POST['avatar'] . '");');
}
header('Location: connection.php');