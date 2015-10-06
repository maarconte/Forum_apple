<?php

include('includes/db.php');


$request= $pdo->query('UPDATE users SET  avatar="'.$_POST['avatar'].'" WHERE  id="'.$_GET['id'].'"');
$result=$request->fetchAll();

header('Location: profil.php?id='.$_SESSION["id"].'');
?>