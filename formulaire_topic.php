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
		 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!--[if IE]>
    <script type="text/javascript" src="js/modernizr.custom.78869.js">
    </script>
<![endif]-->
<script type="text/javascript">
$(function(){

   $('.icon').click(function(e){
      $('.profil_nav').toggle();
         e.stopPropagation();
      });
});

</script>
</head>
<body>
	<header>

  <div class="hello"><?php
include('includes/db.php');
            ?>
            
          <p id="profil" style="margin:20px 70px;"> <?= $_SESSION['users']['pseudo']."  ";
            ?> </p>

         <div class="pp icon" style="background-color:#fff;width:50px;height:50px;position: absolute;right: 10px;top: 10px;">
         <?php 
         $request= $pdo->query('SELECT*FROM users WHERE id="'.$_SESSION['users']['id'].'" ');
         $result=$request->fetchAll();
          ?> 
         <img src="<?=$result['0']['avatar']?>" alt="user" style="height:50px">
      </div>

            <ul class="profil_nav">
               <li><a href="profil_page.php?id=<?=$_SESSION['users']['id']?>">Profil</a></li>
               <li> <a href="update_profil.php?id=<?=$_SESSION['users']['id']?>">Modifier Profil</a></li>
               <li>  <a href="logout.php"> <i class="fa fa-sign-out"></i> Log out</a></li>   
            </ul>
           </div>


     <a href="accueil.php"><h1>Forum</h1></a>

<div class="nav">
  <a href="liste.php">Liste des membres</a>
</div>

  <form action="search.php" method="post"><input type="text" name="search" placeholder="Search" id="search"></form>
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