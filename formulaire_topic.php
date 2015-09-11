<!DOCTYPE html>
<html lang="FR-fr">
<head>
	<meta charset="UTF-8">
	<title>Création de Topic</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/connect.css">
    <link rel="stylesheet" type="text/css" href="css/form-topic.css">
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
?><a href="logout.php"><button><i class="fa fa-sign-out"></i> Log out
</button></a></div>	

     <a href="accueil.php"><h1>Forum</h1></a>

<div class="nav">
  <a href="liste.php">Liste des membres</a>
</div>
</header>


<div class="container" >
<h2>Topic</h2>
<form action="insert_topic.php" method="post" >
	<input type="text" placeholder="Titre" name="title" >
	<textarea placeholder="Texte" name="description"></textarea>
	<input type="submit">
</form>
</div>
</body>
</html>