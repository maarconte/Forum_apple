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
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!--[if IE]>
    <script type="text/javascript" src="js/modernizr.custom.78869.js">
    </script>
<![endif]-->
   <script type="text/javascript">
$(function(){

   $('#profil').click(function(e){
      $('.profil_nav').toggle();
         e.stopPropagation();
      });
});

</script>
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


a>h2{
    color: #333333;
    font: 16px 'Open Sans'; 
    line-height: 60px;
}

</style>


</head>
<body>

      <header>


         <div class="hello"><?php
include('includes/db.php'); ?>

            
          <p id="profil"> <?= "Bonjour " . $_SESSION['users']['pseudo']."  ";
            ?></p>

            <ul class="profil_nav">
               <li><a href="profil_page.php?id=<?=$_SESSION['users']['id']?>">Profil</a></li>
               <li> <a href="update_profil.php?id=<?=$_SESSION['users']['id']?>">Modifier Profil</a></li>
               <li>  <a href="logout.php"> <i class="fa fa-sign-out"></i> Log out</a></li>   
            </ul>

          

           </div>

         <a href="accueil.php">
            <h1>Forum</h1>
         </a>


   <div class="nav">
         <a href="liste.php">Liste des membres</a>
        
   </div>
      </header>

	<?php


$request = $pdo->query('SELECT * FROM users;');
$result = $request->fetchAll();

for ( $i = 0; $i < count($result); $i++ ) {
?>
<div class="row">
<a href="profil_page.php?id=<?=$result[$i]['id']?>"><h2><?=$result[$i]['pseudo']?></h2></a></div>


<?php
}

?>
</body>
</html>