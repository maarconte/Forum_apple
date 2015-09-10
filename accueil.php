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
  .hello{
    
    position: absolute;
    right: 10px;
    top:10px;
    text-align: right;
      }

  header{
  height: 400px;
  background: url('http://images.apple.com/support/assets/images/home/2015/us_en_hero_1440.jpg') no-repeat scroll center;
  position: relative;
}

table{
  margin-top: 30px;
}

tr{
  background:#FFE100;
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
?><a href="logout.php"><button><i class="fa fa-sign-out"></i> Log out</button></a></div>  

   <a href="accueil.php"><h1>Forum</h1></a>

 
</header>

<div class="nav">
  <a href="liste.php">Liste des membres</a></br>
  <a href="inscription.html">Inscription</a></br>
  <a href="connection.html">Connexion</a></br>
</div>

<?php 
$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO(
  $dsn,
  $user,
  $pass
);

$request = $pdo->query( 'SELECT * FROM topics' );
$result = $request->fetchAll();
$ligne=count($result);



 ?>


<a href="formulaire_topic.php"><h2>Nouveau topic <i class="fa fa-plus"></i></h2></a>

<table>

<theader>
  <tr>
    <td>Topics</td>
    <td>Auteurs</td>
    <td>Dates</td>
  </tr>
</theader>
<?php for ($i=0; $i<$ligne;$i++){ ?>
<tbody>
  <tr>
    <td><a href="topic.php?id=<?=$result[$i]['id']?>"><?=$result[$i]['title']?></a></td>
     <td> <a href="#"><?php 

  $request2 = $pdo->query( 'SELECT * FROM users WHERE id="' .$result[$i]['creatorId']. '"' );
  $result2 = $request2->fetchAll();
  echo $result2[0]['pseudo'];
?></a></td>



   <td> <a href="#"><?=$result[$i]['creation']?></a></td>
  </tr>
</tbody>  <?php }
    ?>
</table>

</body>
</html>