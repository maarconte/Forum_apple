<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<link rel="stylesheet" type="text/css" href="css/normaliz.css">
		<link rel="stylesheet" type="text/css" href="css/connect.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
	<!--[if IE]>
    <script type="text/javascript" src="js/modernizr.custom.78869.js">
    </script>
<![endif]-->
<style>
	.row{
		height: 60px;
		width: 800px;
		overflow: hidden;
		margin: 0 auto 10px;
		position: relative;
		background:#F7F7F7 url('../images/user.png') no-repeat;
		background-size: 60px 60px;	
	}	

	.hello{
    
    position: absolute;
    right: 10px;
    top:10px;
    text-align: right;

      }

  header{
  height: 400px;
  background: url('http://images.apple.com/support/assets/images/home/2015/us_en_hero_1440.jpg') no-repeat scroll center;
  background-size: 100%;
  position: relative;
  margin-bottom: 30px;
}

h1{
  line-height: 300px;
    color: #333333;
}

button{
  border: none;
  background: rgba(255,255,255,0.5);
  border: solid 1px #333333;
  height: 30px;
  width: 90px;
  padding: 3px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;

}

 a>button{
    color: #333333;
    font: 14px 'Open Sans';
    cursor: pointer; 
}

a>h2{
    color: #333333;
    font: 16px 'Open Sans'; 
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
?>

<a href="logout.php"><button><i class="fa fa-sign-out"></i> Log out</button></a></div>	

  <a href="accueil.php"><h1>Forum</h1></a>

 <div class="nav">
  <a href="liste.php">Liste des membres</a></br>
  <a href="inscription.html">Inscription</a></br>
  <a href="connection.html">Connexion</a></br>
</div>
</header>


	<?php


$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);

$request = $pdo->query('SELECT * FROM users;');
$result = $request->fetchAll();

for ( $i = 0; $i < count($result); $i++ ) {
?>
<div class="row">
<a href="#"><h2><?=$result[$i]['pseudo']?></h2></a></div>


<?php
}

?>
</body>
</html>