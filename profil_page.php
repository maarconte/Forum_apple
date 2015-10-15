<!DOCTYPE html>
<html lang="fr">
   <head>
   <meta charset="UTF-8">
      <title>Page de profil - Episodes</title>
      <!-- Slider header -->
      <link rel="stylesheet" href="cssslider_files/csss_engine1/style.css">
      <!-- Favicon -->
      <link rel="icon" href="images/logo_icon.png" type="image/png">
      <!-- Hover.css -->
      <link rel="stylesheet" href="Hover-master/css/hover.css">
      <!--  CSS -->
      <link rel="stylesheet" type="text/css" href="css/normalize.css">
      <link rel="stylesheet" type="text/css" href="css/accueil.css">
      <link rel="stylesheet" type="text/css" href="css/connect.css">
      <link rel="stylesheet" type="text/css" href="css/form-topic.css">
      <!-- Font -->
       <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="font-awesome-4.3.0/css/font-awesome.css">
      <!-- Jquery -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!--[if IE]>
      <script type="text/javascript" src="js/modernizr.custom.78869.js"></script>
      <![endif]-->


      <title>Profil Page</title>
   </head>
   <body>
      <?php include('includes/db.php');?>
      <?php include("header.php"); ?>
      <div class="container">
         
            <?php 
               $Forum  = new Forum($pdo);
               $profil = $forum->selectUser($_GET['id']);
               $ligne  = count($profil);
               
                ?> 
            <?php
               if (empty($profil[0]['avatar'])) {
               ?>
            <div class="pp_user ">
               <img src="../images/user.png" alt="user" style="left:inherit">
            </div>
            <?php
               }
              else {?>
              <div class="pp_liste">
               <img src="<?=$profil['0']['avatar']?>" alt="user">
         </div>
               <?php } ?>
            
         <h3><?=$profil[0]['pseudo']?></h3>
         <ul id="menu_profil">
            <li class="onglet active">
               <a href="profil_page.php?id=<?=$_GET['id']?>">
                  <h4>Topics: </h4>
               </a>
            </li>
            <li class="onglet">
               <a href="messages_user.php?id=<?=$_GET['id']?>">
                  <h4>Derniers messages:</h4>
               </a>
            </li>
         </ul>
         <?php 
            $topics  =  $forum->afficherTopicUser($_SESSION['users']['id']);
            $ligne   =  count($topics);
            
            for ( $i = 0; $i < $ligne; $i++ ) {
               if ($ligne > 0) {?>
         <ul class="result">
            <li><a href="topic.php?id=<?=$topics[$i]['id']?>"><?=$topics[$i]['title']?>
               </a>
            </li>
            <span class="date"><?=$topics[0]['creation']; ; die()?></span> 
         </ul>
         <?php }
            else{
            echo "Pas de topics";
            die();
            }
            } ?>
      </div>
   </body> 
   </html>