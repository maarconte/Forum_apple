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

// Dans les versions de PHP antiéreures à 4.1.0, la variable $HTTP_POST_FILES
// doit être utilisée à la place de la variable $_FILES.

$uploaddir = '/images/avatars_users/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);


if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
} else {
    echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
}

echo 'Voici quelques informations de débogage :';


header('Location: connection.php');