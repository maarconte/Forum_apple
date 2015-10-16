<?php
// Dans les versions de PHP antiéreures à 4.1.0, la variable $HTTP_POST_FILES
// doit être utilisée à la place de la variable $_FILES.
include('includes/db.php');
include('includes/forum.php');

$a = explode('.', $_FILES['userfile']['name']);

$ext=$a[count($a) - 1];
$name=uniqid().".".$ext;

$uploaddir = 'images/avatars_users/';
$uploadfile = $uploaddir . $name;


if ( in_array($ext, ['jpg', 'png','jpeg','gif']) ){

		


		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

			$forum= new Forum($pdo);
        	$avatar=$forum->ajouterAvatar($name,$_GET['id']);

		    echo " Le fichier est valide, et a été téléchargé
		           avec succès.";


		} else {
		    echo " Fichier trop lourd, maximum 1mo";
		}

	// ok
}

else {
	echo "Erreur de format ";
}


header('Location: update_profil.php?id='.$_GET['id'].'');


?>  