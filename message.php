<?php

include('includes/db.php');

$sql='INSERT INTO messages(creation,creatorId,topicId,message) VALUES(NOW(), "'.$_SESSION['users']['id'].'","'.$_GET['id'].'", "'.$_POST['message'].'")';
$request=$pdo->query($sql);


header('Location:topic.php?id=' . $_GET['id'].'');

// print_r($result);
// die();

?>

