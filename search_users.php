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

.container{
  width: 800px;
  margin: 0 auto;
}
   .row{
      height: 200px;
      width: 150px;
      overflow: hidden;
      margin: 0 auto 10px;
      position: relative;
      background:#F7F7F7 ;
    float: left;
    margin-right: 10px;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;

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
$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO(
  $dsn,
  $user,
  $pass
);

         $request = $pdo->query( 'SELECT * FROM users WHERE pseudo LIKE "%'.$_POST['search'].'%" ORDER BY pseudo;' );
         $result = $request->fetchAll();
         $ligne=count($result); 

     
        for ($i=0; $i <= $ligne ; $i++) { 

          if ($ligne>0) { ?>
                  <div class="container">
<div class="row">
<?php if (empty($result[$i]['avatar'])) { ?>
     <div class="pp">
         <img src="../images/user.png" alt="user" style="left:inherit">

      </div>
      <a href="profil_page.php?id=<?=$result[$i]['id']?>"><h2><?=$result[$i]['pseudo']?></h2></a> 
<?php } ?>
     <div class="pp">
         <img src="<?=$result[$i]['avatar']?>" alt="user">
      </div>

<a href="profil_page.php?id=<?=$result[$i]['id']?>"><h2><?=$result[$i]['pseudo']?></h2></a></div>

</div>




          <?php } die(); } ?>


</body>
</html>