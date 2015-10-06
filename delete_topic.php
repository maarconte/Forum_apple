<?php

include('includes/db.php');
include('includes/forum.php');

$forum=new Forum($pdo);
$delete=$forum->deleteTopic($_GET['id']);

header('Location: update_profil.php?id='.$_SESSION["users"]["id"].'');


?>
