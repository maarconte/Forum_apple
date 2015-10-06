<?php

<<<<<<< HEAD

include('includes/db.php');
include('includes/forum.php');
=======
include('includes/db.php');

>>>>>>> origin/master

    $forum= new Forum($pdo);
	$result=$forum->updateAvatar($_POST['avatar'],$_GET['id']);

header('Location: profil.php?id='.$_SESSION["id"].'');
?>