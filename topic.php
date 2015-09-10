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

button>a{
    color: #333333;
    font: 16px 'Open Sans';
 
}

.post{
  width: 800px;
  margin: 0 auto;
}

.post>p{
    text-align: left;
}

.post>h2{
    background:#FFE100;
  height: 30px;
  line-height: 30px;
}

form{
  width: 800px;
  margin: 50px auto;
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
<h2><?= $result[$i]['title'] ?></h2>

<p><?= $result[$i]['description'] ?></p>
</div>

<div class="message">
  
  <p></p>
</div>

<form action="message.php" method="post">
  
<textarea name="message" id="message" cols="30" rows="10"></textarea>
<input type="submit">


</form>




<?php 
}?>
</tbody>
</table>

</body>
</html>