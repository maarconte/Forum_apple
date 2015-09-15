<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/connect.css">
    <link rel="stylesheet" type="text/css" href="css/topic.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
	<!--[if IE]>
    <script type="text/javascript" src="js/modernizr.custom.78869.js">
    </script>
<![endif]-->

</head>

<body>
<header>

<div class="hello"><?php

include('includes/db.php');

if ( empty($_SESSION['users']) ) {
	header('Location: connection.html');
	die();
}

echo "Bonjour " . $_SESSION['users']['pseudo']."  ";
?><a href="logout.php"><button><i class="fa fa-sign-out"></i> Log out</button></a></div>	

    <a href="accueil.php"><h1>Forum</h1></a>
<div class="nav">
  <a href="liste.php">Liste des membres</a></br>
</div>
 
</header>



<?php

$request=$pdo->query('SELECT * FROM topics WHERE id='.$_GET["id"].';');

$result=$request->fetchAll();
$ligne = count($result);
/* print_r($result);
 die();*/


 for ($i=0; $i <count($result) ; $i++){ ?>

<div class="post" >
<h2><?php $request2 = $pdo->query( 'SELECT * FROM users WHERE id="' .$result[$i]['creatorId']. '"' );
  $result2 = $request2->fetchAll();
  echo $result2[0]['pseudo'].": ".$result[$i]['title']."     ".$result[$i]['creation'];?></h2>

<p><?= $result[$i]['description'] ?></p>
</div>

<div class="message">
  
  <?php



  $request = $pdo->query( 'SELECT * FROM messages  WHERE topicId="'.$_GET['id'].'" ORDER BY creation DESC;  ' );
  $result = $request->fetchAll();
  $ligne=count($result);

for ($i=0; $i<$ligne;$i++){ ?>

<div class="post"><p> <?php  $request2 = $pdo->query( 'SELECT * FROM users WHERE id="' .$result[$i]['creatorId']. '"' );
  $result2 = $request2->fetchAll();
  echo $result2[0]['pseudo'].": ".$result[$i]['message']."     ".$result[$i]['creation']; ?></p>
</div>


<?php }
  ?>

</div>
<h2>Répondre</h2>
<form action="message.php?id=<?=$_GET['id']?>" method="post">
  
<textarea name="message" id="message" cols="30" rows="10"></textarea>
<input type="submit">


</form>




<?php 
}?>
</tbody>
</table>

</body>
</html>