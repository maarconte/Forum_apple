<?php
include('includes/db.php');
include('includes/forum.php');
    $forum= new Forum($pdo);
	$result=$forum->updateAvatar($_POST['avatar'],$_GET['id']);
header('Location: update_profil.php?id='.$_GET['id'].'');
?>