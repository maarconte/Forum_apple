<form method="POST" action="Controleur/modifier-profil-photo.php" enctype="multipart/form-data">
<?php include("Controleur/photo-profil.php"); ?>
<p class="modifier-profil-bloc-droite-image-label">Modifier votre photo de profil : </p>
<input id="photo-profil" class="modifier-profil-bloc-droite-image-input" type="file" name="photo-profil"/>
<input class="modifier-profil-submit2" type="submit" value="Upload"/>
</form>[/html]
Et voila la page qui traite les données du formulaire :
[php]
<?php 

//Propriétés du fichier téléchargé
$name = $_FILES['photo-profil']['name'];
$type = $_FILES['photo-profil']['type'];
$size = $_FILES['photo-profil']['size'];
$temp = $_FILES['photo-profil']['tmp_name'];
$error = $_FILES['photo-profil']['error'];

if ($error > 0)
{
//Une erreur s'est produite au niveau de la photo, la photo ne convient pas.
header('Location: ');
}
elseif (substr($type, 0, 5) != 'image')
{
//On vérifie qu'il s'agit bien d'une image
header('Location: ');
}
elseif ($size > 5000000)
{
//On vérifie le poids de l'image
header('Location: ');
}
else
{
//Il n'y a pas d'erreurs au niveau de la photo, on peut envoyer la photo dans le fichier Images/photo-profil/
move_uploaded_file($temp, " URL " . $name);

//On enregistre le chemin vers la photo dans la table membre

//On se connecte à la base de données
include("bd.php");

//On effectue la requête
$req = $bdd->prepare('UPDATE images SET img = ? WHERE userid = ?');
$req->execute(array($name, $_SESSION['userid']));

//Redirection vers la page de modification de profil
header('Location: accueil.php');
}

?>[/php]