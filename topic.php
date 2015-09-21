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

   $('.icon').click(function(e){
      $('.profil_nav').toggle();
         e.stopPropagation();
      });
});

</script>
<style>
  .head_post{
  position:relative;
  background:#FFE100;
  height: 60px;
  line-height: 60px;
  margin: 0 0 10px;
    -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  }
  .date{
    font-size: small;
    color:#616161;
    position: absolute;
    right: 10px;
    top:10px;
    margin: 0;

  }

  .creator{
    position: absolute;
    left: 10px;
    top:10px;
    margin: 0;
  }
  .post_first{
     width: 800px;
  margin: 0 auto 30px;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  }

  .post{
    position: relative;
  }
  h4{
    font-weight: 600;
    margin: 0;
  }
</style>
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


         <a href="accueil.php">
            <h1>Forum</h1>
         </a>


   <div class="nav">
         <a href="liste.php">Liste des membres</a>
        
   </div>

     <form action="search.php" method="post"><input type="text" name="search" placeholder="Search" id="search"></form>
      </header>




<?php

$request=$pdo->query('SELECT * FROM topics WHERE id='.$_GET["id"].';');

$result=$request->fetchAll();
$ligne = count($result);
/* print_r($result);
 die();*/


 for ($i=0; $i <count($result) ; $i++){ ?>


<div class="head_post">
<h2><?php $request2 = $pdo->query( 'SELECT * FROM users WHERE id="' .$result[$i]['creatorId']. '"' );
  $result2 = $request2->fetchAll();
  echo $result[$i]['title']?></h2>

 <a href="profil_page.php?id=<?=$result[$i]['creatorId']?>"><p class="creator"><?=$result2[0]['pseudo']?></p></a>

  <span class="date"><?=$result[0]['creation'];?></span> 
</div>

<div class="post_first" >
<p><?= $result[$i]['description'] ?></p>
</div>

<div class="message">
  
  <?php



  $request = $pdo->query( 'SELECT * FROM messages  WHERE topicId="'.$_GET['id'].'" ;  ' );
  $result = $request->fetchAll();
  $ligne=count($result);

for ($i=0; $i<$ligne;$i++){ ?>

<div class="post"><p> <?php  $request2 = $pdo->query( 'SELECT * FROM users WHERE id="' .$result[$i]['creatorId']. '"' );
  $result2 = $request2->fetchAll();
  ?>

  <h4><?=$result2[0]['pseudo'].": "?></h4><?= $result[$i]['message']?></p>
  </p><span class="date"><?=$result[0]['creation'];?></span> 
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