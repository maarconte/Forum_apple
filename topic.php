<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/connect.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
	<!--[if IE]>
    <script type="text/javascript" src="js/modernizr.custom.78869.js">
    </script>
<![endif]-->
	<style>
table{
  margin-top: 30px;
}

h1{
  line-height: 300px;
  color: #333333;
}

button{
  border: none;
  background: transparent;
  border: solid 1px #333333;
  height: 30px;
  width: 90px;
  padding: 3px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
span{
  display: block;
   float: left;
}
button>a{
    color: #333333;
    font: 16px 'Open Sans';
 
}

.post{
  width: 800px;
  margin: 0 auto 30px;
  padding: 5px;
}
.post:nth-child(odd){
  background: #F1F1F1;
  
}
.post>p{
    text-align: left;

}

.post>h2{
    background:#FFE100;
  height: 30px;
  line-height: 30px;
  margin: 0;
}

form{
  width: 800px;
  margin: 0 auto;
}

form>input[type=submit]{
  width: 100px;
}
</style>
</head>

<body>
<header>

<div class="hello"><?php

session_start();

if ( empty($_SESSION['users']) ) {
	header('Location: connection.html');
	die();
}

echo "Bonjour " . $_SESSION['users']['pseudo']."  ";
?><button><a href="logout.php"><i class="fa fa-sign-out"></i> Log out
</a></button></div>	

    <a href="accueil.php"><h1>Forum</h1></a>

 
</header>

<div class="nav">
  <a href="liste.php">Liste des membres</a></br>
  <a href="inscription.html">Inscription</a></br>
  <a href="connection.html">Connexion</a></br>
</div>

<?php
$dsn='mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass ='';

$pdo = new PDO(
$dsn,
$user,
$pass 
);

$request=$pdo->query('SELECT * FROM topics WHERE id= '. $_GET["id"].';
');

$result=$request->fetchAll();
$ligne = count($result);
// print_r($result);
// die();
?>

<?php for ($i=0; $i <count($result) ; $i++){ ?>

<div class="post" >
<h2><?php $request2 = $pdo->query( 'SELECT * FROM users WHERE id="' .$result[$i]['creatorId']. '"' );
  $result2 = $request2->fetchAll();
  echo $result2[0]['pseudo'].": ".$result[$i]['title']."     ".$result[$i]['creation'];?></h2>

<p><?= $result[$i]['description'] ?></p>
</div>

<div class="message">
  
  <?php



  $request = $pdo->query( 'SELECT * FROM messages WHERE topicId="'.$result[$i]['id'].'";' );
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
<form action="message.php?id=<?=$result[$i]['id']?>" method="post">
  
<textarea name="message" id="message" cols="30" rows="10"></textarea>
<input type="submit">


</form>




<?php 
}?>
</tbody>
</table>

</body>
</html>